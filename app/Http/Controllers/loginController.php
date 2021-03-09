<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator, Hash, Auth, Mail, Str;
use App\Models\User;

class loginController extends Controller

{



    public function Login()
    {
        return view('login');
    }

    public function postLogin(Request $request)
    {
        $rules = [
            'email' => 'required|email',
            'password' => 'required|min:8'
        ];

        $messages = [
            'email.required' => "El correo es obligatorio",
            'email.email' => "Formato Invalido",
            'password.required' => "Por favor escriba su contraseña",
            'password.min' => "La contraseña debe ser de al menos 8 caracteres",
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) :
            return back()->withErrors($validator)->with('message', 'Se ha producido un error')
                ->with('typealert', 'danger');
        //Autenticacion de usuarios existente y de usuarios en si.
        else :
            if (Auth::attempt([ 'email' => $request->input('email'),'password' => $request->input('password')
            ], true)) :
                 return redirect('/Publicaciones');
            else :
                return back()->with('message', 'Correo electronico o contraseña erronea')
                    ->with('typealert', 'danger');
            endif;
        endif;
    }

    public function Register()
    {
        return view('register');
    }

    public function postRegister(Request $request)
    {
        $rules = [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
            'cpassword' => 'required|min:8|same:password'
        ];

        $messages = [
            'name.required' => "El nombre es obligatorio",
            'email.required' => "El correo es obligatorio",
            'email.email' => "Formato Invalido",
            'password.required' => "Por favor escriba su contraseña",
            'password.min' => "La contraseña debe ser de al menos 8 caracteres",
            'cpassword.required' => "Por favor escriba nuevamente su contraseña",
            'cpassword.min' => "La contraseña debe ser de al menos 8 caracteres",
            'cpassword.same' => "Las contraseñas deben ser iguales"
        ];


        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) :
            return back()->withErrors($validator)->with('message', 'Se ha producido un error')->with('typealert', 'danger');
        else :
            $user = new User;
            $user->name = e($request->input('name'));
            $user->email = e($request->input('email'));
            $user->password = Hash::make($request->input('password'));

            if ($user->save()) :
                return redirect('/Login')->with(
                    'message',
                    'Su usuario se ha creado con exito'
                )->with('typealert', 'success');
            endif;
        endif;
    }
}
