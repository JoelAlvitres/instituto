<x-mail::message>
    # Nuevo mensaje de contacto

    Has recibido un nuevo mensaje desde el sitio web:

    **Nombre:** {{ $nombre }}
    **Email:** {{ $email }}
    **Teléfono:** {{ $telefono }}

    **Mensaje:**
    {{ $mensaje }}

    Gracias,<br>
    {{ config('app.name') }}
</x-mail::message>