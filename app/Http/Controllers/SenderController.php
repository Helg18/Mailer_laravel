<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Correo;
use App\Cliente;
use Laracasts\Flash\Flash;
use App\Http\Controllers\Controller;

class SenderController extends Controller
{
  
    public function listarcorreos()
    {
      $Correos=Correo::orderBy('correo', 'ASC')->paginate(10);
      return view('admin.sender.lista')->with('Correos', $Correos);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.sender.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $correos_enviados= 0;
      $correos_inactivos=0;
      $clientes_inactivos=0;
      $cliente_activos=0;
      $total_clientes=0;
      $total_correos=0;
        $asunto    = $request->asunto;
        $cuerpo    = $request->cuerpo;
        $cabeceras = 'From: henry.leon@mailer.com' . "\r\n" .
        'Reply-To: henry.leon@mailer.com' . "\r\n" .
        'X-Mailer: PHP/' . phpversion();

        $emails= Correo::all();
        foreach ($emails as $email => $identificador)
        {
          if($identificador->id >= 1)
          {
            $total_correos++;
          }
        }
      
      
        $Cliente = Cliente::all();//->where('estatus', 'ACTIVO');

        foreach ($Cliente as $estatus => $id) {
         $total_clientes++;
            //echo $id."<br>";
            if ($id->estatus =='ACTIVO') 
            {
                $cliente_activos++;
                $Correo = Correo::all()->where('cliente_id', $id->id);

                foreach ($Correo as $estado => $value) 
                {
                  if ($value->estatus == 'ACTIVO') 
                  {
                    $correos_enviados++;
                    $para  = $value->correo;
                    mail($para, $asunto, $cuerpo, $cabeceras);
                    
                  }
                }
            }
            
        }
        Flash::success(
          'Se enviaron '.$correos_enviados.
          "/".($total_correos).
          " correos a ".$cliente_activos.
          "/".($total_clientes).
          " clientes activos");
        return redirect()->route('Admin.Clients.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $correo = Correo::find($id);
      $cliente = Cliente::find($correo->cliente_id);
      return view('admin.sender.edit')->with('correo', $correo)->with('cliente', $cliente);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $correo= Correo::find($id);
      $antiguo= $correo->correo;
      $estatusantiguo= $correo->estatus;
      $correo->correo = $request->email;
      $correo->estatus= $request->estatus;
      //dd($correo);
      $correo->save();
      if($antiguo == $correo->correo and $correo->estatus != $estatusantiguo)
      {
        $guarda = 'si';
        Flash::success('El correo '.$correo->correo .' ahora se encuentra '.$correo->estatus);
      }
      if($antiguo != $correo->correo)
      {
        $guarda='si';
        Flash::success('Se modifico el correo '.$antiguo.' por '. $correo->correo .' de forma satisfactoria');
      }
      if($correo->estatus == $estatusantiguo and $correo->correo == $antiguo)
      {
        $guarda = 'no';
        Flash::error('No se encontraron cambios para el cliente '.$correo->correo );
      }
      if($guarda == 'si')
      {
      $correo->save();
      }
      return redirect()->route('Admin.Sender.listarcorreos', $correo->cliente_id );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $correo = Correo::find($id);
        $cliente = Cliente::find($correo->cliente_id);
        $correo -> delete();
      
        Flash::error('El correo '.$correo->correo.' fue eliminado correctamente');      
        return redirect()->route('Admin.Sender.listarcorreos', $correo->cliente_id );
    }
}
