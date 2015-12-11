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
        $asunto    = $request->asunto;
        $cuerpo    = $request->cuerpo;
        $cabeceras = 'From: henry.leon@mailer.com' . "\r\n" .
        'Reply-To: henry.leon@mailer.com' . "\r\n" .
        'X-Mailer: PHP/' . phpversion();


        $Cliente = Cliente::all();//->where('estatus', 'ACTIVO');

        foreach ($Cliente as $estatus => $id) {
            //echo $id."<br>";
            if ($id->estatus =='ACTIVO') {
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
                  else
                  {
                    $correos_inactivos++;
                  }
                }
            }
            else
            {
              $clientes_inactivos++;
            }
        }
        Flash::success('Se enviaron '.$correos_enviados." correos a ".$cliente_activos." clientes activos");
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
