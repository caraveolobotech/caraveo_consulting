<?php
// app/Mail/ContactMail.php

/*
===============================================================
Autor: Rubén Caraveo García
Email: contacto@caraveolobotech.com
Empresa: Caraveo LoboTech IT
Descripción:
Mailable que encapsula el contenido del formulario de contacto.
Se mapea 'message' a 'body' para evitar conflicto con la variable $message
inyectada por Laravel en las vistas de correo.
===============================================================
*/

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data; // datos validados del formulario

    /**
     * Create a new message instance.
     *
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // Mapeamos 'message' a 'body' para evitar colisión con $message (Illuminate\Mail\Message)
        $viewData = [
            'name'    => $this->data['name']    ?? '',
            'company' => $this->data['company'] ?? '',
            'email'   => $this->data['email']   ?? '',
            'phone'   => $this->data['phone']   ?? '',
            'body'    => $this->data['message'] ?? '', // <-- aquí renombramos
        ];

        return $this->subject('📩 Nuevo mensaje de contacto: ' . ($viewData['name'] ?? 'sin nombre'))
                    ->replyTo($viewData['email'])
                    ->view('emails.contact')
                    ->with($viewData);
    }
}