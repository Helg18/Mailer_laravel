<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Accessos;
use Laracasts\Flash\Flash;
use App\Http\Requests\UserRequest;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          $users = User::orderBy('id', 'ASC')->paginate(10);
          return view('admin.users.index')->with('users', $users);
        /*$users = User::orderBy('id', 'ASC')->paginate(5);
          return view('admin.users.index')->with('users', $users);*/


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {

      $user             = new User($request->all());
      $user -> password = bcrypt($request->password); //aca encripto la contraseña
      $user -> perfil   = 'usuario';
      $user -> save();
      $accesos          = new Accesos();
      $accesos -> user_id = $user->id;
      $accesos -> crea
      
      Flash::success('Se ha registrado exitosamente el usuario: '.$user->name);
      
      return redirect()->route('Admin.Users.index');
      
      /*
      Otra manera de redireccionar
      $users = User::orderBy('id', 'ASC')->paginate(10);
      return view('admin.users.index')->with('users', $users);
      */
      
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
        $user = User::find($id);
          return view('admin.users.edit')->with('user', $user);
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
        $user= User::find($id);
        $user->name = $request -> name;
        $user->email= $request -> email;
        $user->password= bcrypt($request->password);
        $user->save();
        Flash::success('El Usuario '. $user->name .' fue actualizado correctamente');
        return redirect()->route('Admin.Users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function destroy($id)
    {
        $user = User::find($id);
        $user -> delete();
        Flash::error('Usuario '.$user->name.' eliminado correctamente');
        return redirect()->route('Admin.Users.index');
    }
}
