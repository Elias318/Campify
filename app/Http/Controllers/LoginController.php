<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function registro(Request $request)
    {
        $data = $request->validate([
                "username" => ['required', 'min:2', 'max:12', 'alpha_dash'],
                "email" => ["required", "email"],
                "password" => ['required', 'regex:/^(?=.*[A-Za-z])(?=.*\d).+$/', 'confirmed']
            ],
            [
                "username.required" => "Este campo es obligatorio",
                "username.min" => "Este campo necesita más de 2 caracteres",
                "username.max" => "Este campo no puede tener màs de 12 caracteres",
                "username.alpha_dash" => "Este campo solo soporte valores alfanumericos y guiones",
                "email.required" => "Este campo es obligatorio",
                "email.email" => "Este campo tiene que ser un email",
                "password.required" => "Este campo es obligatorio",
                "password.regex" => "La contraseña necesita minimo 1 letra y 1 numero!",
                "password.confirmed" => "Las contraseñas no coinciden"
            ]
        );
        
        $data["password"] = bcrypt($data["password"]);

        User::create($data);

        return response()->redirectTo("inicioSesion")->with("success", "Se registro con exito!");
    }

    public function login(Request $request)
    {
        $data = $request->validate([
            "loginUsername" => ['required'],
            "loginPassword" => ['required']
        ],
        [
            "username.required" => "Este campo es obligatorio",
            "password.required" => "Este campo es obligatorio",
        ]
        );

        if(Auth::attempt(["email" => $data["loginUsername"], "password" => $data["loginPassword"]]) || Auth::attempt(["username" => $data["loginUsername"], "password" => $data["loginPassword"]]))
        {
            $request->session()->regenerate();
            return response()->redirectTo("/");
        }
        else{
            //fallo!
            return response()->redirectTo("inicioSesion")->withErrors(["fail" => "No se encontro el usuario!"]);
        }
    }
    
    public function logout(){
        Auth::logout();
        return response()->redirectTo("/");
    }
}
