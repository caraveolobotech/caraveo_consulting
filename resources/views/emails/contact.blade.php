{{-- resources/views/emails/contact.blade.php --}}
{{-- 
===============================================================
Plantilla del correo que recibirás cuando alguien use el formulario de contacto.
Se usa la variable $body para el texto del mensaje (evita conflicto con $message).
===============================================================
--}}

<!doctype html>
<html>
  <head>
    <meta charset="utf-8" />
    <title>Nuevo mensaje de contacto</title>
  </head>
  <body style="font-family: Arial, sans-serif; color:#111;">
    <div style="max-width:600px; margin:0 auto; padding:16px;">
      <h2 style="color:#00bfff;">Nuevo mensaje de contacto</h2>

      <p><strong>Nombre:</strong> {{ $name }}</p>
      <p><strong>Empresa:</strong> {{ $company }}</p>
      <p><strong>Correo:</strong> {{ $email }}</p>
      <p><strong>Teléfono:</strong> {{ $phone }}</p>

      <hr style="margin:12px 0;" />

      <p><strong>Mensaje:</strong></p>
      <p style="white-space: pre-wrap;">{{ $body }}</p>

      <hr style="margin:12px 0;" />
      <p style="font-size:12px; color:#666;">Enviado desde el formulario de contacto - Caraveo LoboTech IT</p>
    </div>
  </body>
</html>