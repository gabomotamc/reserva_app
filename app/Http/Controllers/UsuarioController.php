<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
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

    public function verAcceder(){

        return view('usuario.accede');

    }// verAcceder


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

        $request->validate([
            'correo' => 'required',
            'clave' => 'required',
            'nombre_apellido' => 'required',
        ]);

        $objUsuario = Usuario::where('correo', $request->correo)->get();
        if(!$objUsuario->isEmpty()){
            $msjError = '¡Ya existe una cuenta con el correo ('.$request->correo.'). Por favor, registrese con otro correo eléctronico!';   
            return back()->withErrors($msjError);
        }    

        $usuario = new Usuario;
        
        $usuario->correo = $request->input('correo');
        $usuario->clave = Hash::make($request->clave);
        $usuario->nombre_apellido =  $request->input('nombre_apellido');
       
        $usuario->save();
        
        $msj = 'Te has registrado exitosamente, ahora puedes iniciar sesión con el correo: ('.$request->correo.').';
<<<<<<< HEAD
        return redirect()->route('acceder')->withSuccess($msj);
=======
        return redirect()->route('acceder')->with('success', $msj);
>>>>>>> c903d36f0a59390149ca26d948ae841e9ef16012
    }
    public function autenticarLogueo(Request $request)
    {

        $request->validate([
            'correo' => 'required',
            'clave' => 'required',
        ]);

        $credencial = array(
            'correo' => $request->input('correo'), 
            'clave' => $request->input('clave')
        );

        $objUsuario = Usuario::where('correo', $request->correo)->get();
        if ($objUsuario->isEmpty()) {
            return back()->withErrors('El usuario no existe');
        }else{

            if (Hash::check($request->clave, $objUsuario[0]->clave ))
            {

                Auth::loginUsingId($objUsuario[0]->id);
                $sesion = Auth::user();
                return redirect()->route('verPerfil');

               
            }else{

                return back()->withErrors('La contraseña es incorrecta');

            }           

        }     

    }// autenticarLogin

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function show(Usuario $usuario)
    {
        return view('usuario.perfil');
    }

    public function cerrarSesion(){

        Auth::logout();
        return redirect()->route('acceder');

    }// cerrarSesion

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function edit(Usuario $usuario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Usuario $usuario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function destroy(Usuario $usuario)
    {
        //
    }
}
