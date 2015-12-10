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
      $correo->correo = $request->email;
      $correo->estatus= $request->estatus;
      //dd($correo);
      $correo->save();
      Flash::success('Se modifico el correo '.$antiguo.' por '. $correo->correo .' de forma satisfactoria');
      return redirect()->route('Admin.Clients.edit', $correo->cliente_id );
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
