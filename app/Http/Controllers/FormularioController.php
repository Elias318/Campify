<?php

namespace App\Http\Controllers;

use App\Mail\OrderShipped;
use Illuminate\Http\Request;
use App\Mail\FormularioMailable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\RedirectResponse;

class FormularioController extends Controller
{
    public function enviarFormulario(Request $request): RedirectResponse
    {

        $nombre = $request->input('nombre_postulado');
        $apellido = $request->input('apellido_postulado');
        $email = $request->input('email_postulado');
        $puesto = $request->input('puesto_solicitado');
        $telefono = $request->input('telefono_postulado');
        $cv = $request->file('cv'); // Acceder al archivo

        // Subir el archivo al sistema
        $cvPath = $cv->store('cvs'); // Guardar en `storage/app/cvs`

        Mail::to("romerosebastian781@gmail.com")->send(new OrderShipped($nombre, $apellido, $telefono, $email, $puesto, $cvPath));

        // Redirigir al formulario
        return response()->redirectTo('/');
    }
    
}