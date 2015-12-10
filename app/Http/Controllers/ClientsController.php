<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\ClientRequest;
use App\Http\Controllers\Controller;
use Laracasts\Flash\Flash;
use App\Cliente;
use App\Correo;

class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes = Cliente::orderBy('id', 'ASC')->paginate(10);
        return view('admin.clients.index')->with('clientes', $clientes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.clients.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClientRequest $request)
    {
        //dd($request->all());
        $Cliente = new Cliente($request->all());
        $Cliente -> estatus = $request->estatus;
        $Cliente->save();
        Flash::success('Se ha registrado exitosamente el cliente: '.$Cliente->nombre);
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
        $cliente = Cliente::find($id);
        $correo =Correo::all()->where('cliente_id', $cliente->id)->paginate(5);
        return view('admin.clients.edit')
               ->with('cliente', $cliente)
               ->with('correo', $correo);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ClientRequest $request, $id)
    {
        $Cliente= Cliente::find($id);
        $Cliente->nombre = $request -> nombre;
        $Cliente->estatus= $request -> estatus;
        $Cliente->save();
        Flash::success('El Cliente '. $Cliente->nombre .' fue actualizado correctamente');
        //return redirect()->route('Admin.Clients.index');
        return redirect()->route('Admin.Clients.edit', $Cliente->id );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Cliente = Cliente::find($id);
        $Cliente -> delete();
        Flash::error('El cliente '.$Cliente->nombre.' fue eliminado correctamente');
        return redirect()->route('Admin.Clients.index');
    }
}