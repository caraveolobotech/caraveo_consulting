<?php
/*
 |--------------------------------------------------------------------------
 | Web Routes
 |--------------------------------------------------------------------------
 |
 | Archivo: routes/web.php
 | Autor: Rubén Caraveo García
 | Email: contacto@caraveolobotech.com
 | WhatsApp: +52 5561540500
 | Empresa: Caraveo LoboTech IT
 | Descripción: Rutas públicas para la web institucional (home, secciones y
 |              endpoint del formulario de contacto real).
 |
 | NOTAS:
 | - El endpoint '/contact/send' usa el ContactController para validar
 |   y enviar correos a través de un Mailable.
 | - Si se requiere un modo dummy (sin envío real), se puede comentar la
 |   línea del controlador y usar la función anónima anterior para pruebas.
 |
 */

use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;

// Página principal (home)
Route::view('/', 'home');

// Páginas seccionales
Route::view('/consultoria', 'consultoria');
Route::view('/capacitacion', 'capacitacion');
Route::view('/productos', 'productos');
Route::view('/historia', 'historia');

// Endpoint real para el formulario de contacto
Route::post('/contact/send', [ContactController::class, 'send'])->name('contact.send');