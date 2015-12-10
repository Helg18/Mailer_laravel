<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Laracasts\Flash\Flash;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Cliente;
use App\Correo;

class AddemailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
      $cliente = Cliente::find($id);
      return view('admin.clients.correos.index')->with('cliente', $cliente);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $Cliente = Cliente::find($request->id);
      $correo = new Correo;
      $correo->correo = $request->email;
      $correo->estatus= 'ACTIVO';
      $correo->cliente_id = $request->id;
      //dd($correo); //Verificacion de recepcion de todos los datos.
      $correo->save();
      Flash::success('Se agrego el correo '.$correo->correo.' al cliente '. $Cliente->nombre .' de forma satisfactoria');
      return redirect()->route('Admin.Clients.edit', $correo->cliente_id );
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
      //dd($id);  // Verificacion de recepcion de datos
      $correo = Correo::find($id);
      $cliente = Cliente::find($correo->cliente_id);
      return view('admin.clients.correos.edit')->with('correo', $correo)->with('cliente', $cliente);
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
      //dd($request->all());
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
        Flash::error('No se registraron cambios es el cliente '.$correo->correo );
      }
      if($guarda == 'si')
      {
      $correo->save();
      }
      return redirect()->route('Admin.Clients.edit', $correo->cliente_id );
    }//fin del metodo

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
      
      $to      = 'helg18@gmail.com';
$subject = 'Correo Eliminado';
$message = 'El correo '.$correo->correo.' asignado al cliente '.$cliente->nombre.' Fue eliminado exitosamente';
$headers = 'From: Notificacion@codeanuwhere.com' . "\r\n" .
    'Reply-To: helg18@gmail.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

mail($to, $subject, $message, $headers);
      
        return redirect()->route('Admin.Clients.edit', $correo->cliente_id );
      
      
      
    }
}
