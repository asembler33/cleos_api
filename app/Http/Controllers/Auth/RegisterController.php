<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    // protected function validator(array $data)
    // {
    //     return Validator::make($data, [
    //         'name' => ['required', 'string', 'max:255'],
    //         'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
    //         'password' => ['required', 'string', 'min:6', 'confirmed'],
    //         'avatar' => ['required', 'image' ,'mimes:jpg,jpeg,png','max:1024'],
    //     ]);
    // }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(Request $request){
        // return request()->file('avatar');
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

    public function index(){

        // $arregloClientes = DB::select("SELECT id,  CONCAT_WS(' ', nombres, apellido_paterno, apellido_materno) AS nombre_completo, username, telefono, correo FROM clientes");
        $arregloClientes = DB::table('users')
                           ->join('roles', 'users.id_rol', '=', 'roles.id')
                           ->select("users.id", "nombres", "apellido_paterno", "apellido_materno", "username", "telefono", "email", "avatar", "rut", "roles.nombre_rol")
                           ->get();

        // var_dump($arregloClientes);

        return response()->json($arregloClientes);
    }


    public function show($id){

        return User::findOrFail($id);
    }



}
