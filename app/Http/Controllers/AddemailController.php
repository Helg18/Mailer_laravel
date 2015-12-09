<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Laracasts\Flash\Flash;
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
    public function create()
    {
        return view('admin.clients.correos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         dd($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $clientes = Cliente::find($id);
      $correos = Correo::orderBy('correo', 'ASC')->where('cliente_id', $clientes->id)->get();
      //$date = $correos -> created_at;
      //dd($correos);
      //$correos ->created_at = date_format(date, 'dd/mm/yy');
      //dd($correos); //verificacion de la linea anterior
      return view('admin.clients.correos.index')
             ->with('clientes', $clientes)
             ->with('correos', $correos);
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
        $correo= Correo::find($id);
        $correo->correo = $request -> correo;
        $correo->save();
        Flash::success('El Cliente '. $correo->correo .' fue actualizado correctamente');
        return redirect()->route('Admin.Addemail.index');
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
