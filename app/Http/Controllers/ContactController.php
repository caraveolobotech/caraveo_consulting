<?php
// app/Http/Controllers/ContactController.php

/*
===============================================================
Autor: Rubén Caraveo García
Email: contacto@caraveolobotech.com
WhatsApp: +52 5561540500
Empresa: Caraveo LoboTech IT
Descripción:
Controlador para procesar el formulario de contacto del sitio.
Valida datos, envía correo usando un Mailable y devuelve feedback.
===============================================================
*/

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;

class ContactController extends Controller
{
    /**
     * Procesa el envío del formulario de contacto
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function send(Request $request)
    {
        // 1) Validación de los datos (server-side)
        $validated = $request->validate([
            'name'    => 'required|string|max:255',
            'company' => 'required|string|max:255',
            'email'   => 'required|email|max:255',
            'phone'   => 'required|string|max:25',
            'message' => 'required|string|max:2000',
        ]);

        // 2) Email destino (tu correo)
        $toEmail = 'contacto@caraveolobotech.com';

        try {
            // 3) Enviar el correo usando un Mailable (ContactMail)
            Mail::to($toEmail)->send(new ContactMail($validated));

            // 4) Retornar con mensaje de éxito
            return redirect()->to(url()->previous() . '#contacto')->with('success', '✅ Gracias por tu mensaje. Te contactaremos pronto.');
        } catch (\Throwable $e) {
            // 5) En caso de error, loguear y devolver mensaje amigable
            Log::error('Error al enviar correo de contacto: ' . $e->getMessage(), [
                'payload' => $validated,
            ]);

            return redirect()->to(url()->previous() . '#contacto')->with('error', '❌ Ocurrió un error al enviar tu mensaje. Por favor intenta más tarde.');           
        }
    }
}