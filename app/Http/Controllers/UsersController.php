<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    protected function store(Request $request){
        
        if (request()->has('avatar')) {
            
            $avatar = request()->file('avatar');
            $avatarName = time() . '.' . $avatar->getClientOriginalExtension();
            $avatarPath = public_path('/images/');
            $avatar->move($avatarPath, $avatarName);            
        }

        $prestadorServicio = $request->input('prestadorServicio') === "Si" ? 1 : 0;

        return User::create([
            'id_profesion' => $request->input('profesiones'),
            'id_rol' => $request->input('rol'),
            'username' => $request->input('usuario'),
            'email' => $request->input('correo'),
            'nombres' => $request->input('nombres'),
            'apellido_paterno' => $request->input('paterno'),
            'apellido_materno' => $request->input('materno'),
            'direccion' => $request->input('direccion'),
            'telefono' => $request->input('telefono'),
            'prestador_servicio' => $prestadorServicio ,
            'rut' => $request->input('rut'),
            'password' => Hash::make($request->input('clave')),
            'avatar' => "/images/" . $avatarName,
        ]);

        $arregloClientes = DB::table('users')
                           ->join('roles', 'users.id_rol', '=', 'roles.id')
                           ->select("users.id, CONCAT_WS(' ', users.nombres, users.apellido_paterno, users.apellido_materno) AS nombre_completo, users.username, users.telefono, users.correo, users.avatar, users.rut", "roles.nombre_rol");

        return $arregloClientes;
    }

    protected function update(Request $request, $id){

        $resultadoUser = DB::table('users')->where('id','=', $id)->get();

        dd($resultadoUser);
        // if (request()->has('avatar')) {
            
        //     $avatar = request()->file('avatar');
        //     $avatarName = time() . '.' . $avatar->getClientOriginalExtension();
        //     $avatarPath = public_path('/images/');
        //     $avatar->move($avatarPath, $avatarName);            
        // }

        // $prestadorServicio = $request->input('prestadorServicio') === "Si" ? 1 : 0;

        // return User::create([
        //     'id_profesion' => $request->input('profesiones'),
        //     'id_rol' => $request->input('rol'),
        //     'username' => $request->input('usuario'),
        //     'email' => $request->input('correo'),
        //     'nombres' => $request->input('nombres'),
        //     'apellido_paterno' => $request->input('paterno'),
        //     'apellido_materno' => $request->input('materno'),
        //     'direccion' => $request->input('direccion'),
        //     'telefono' => $request->input('telefono'),
        //     'prestador_servicio' => $prestadorServicio ,
        //     'rut' => $request->input('rut'),
        //     'password' => Hash::make($request->input('clave')),
        //     'avatar' => "/images/" . $avatarName,
        // ]);

        //     $arregloClientes = DB::table('users')
        //                    ->join('roles', 'users.id_rol', '=', 'roles.id')
        //                    ->select("users.id, CONCAT_WS(' ', users.nombres, users.apellido_paterno, users.apellido_materno) AS nombre_completo, users.username, users.telefono, users.correo, users.avatar, users.rut", "roles.nombre_rol");

        // return $arregloClientes;
    }

    public function index(){

        // $arregloClientes = DB::select("SELECT id,  CONCAT_WS(' ', nombres, apellido_paterno, apellido_materno) AS nombre_completo, username, telefono, correo FROM clientes");
        $arregloClientes = DB::table('users')
                           ->join('roles', 'users.id_rol', '=', 'roles.id')
                           ->select("users.id", "nombres", "apellido_paterno", "apellido_materno", "username", "telefono", "email", "avatar", "rut", "roles.nombre_rol")
                           ->get();

        return response()->json($arregloClientes);
    }


    public function show($id){
        return User::findOrFail($id);
    }

    public function destroy($id){
        User::find($id)->delete();
    }
}
