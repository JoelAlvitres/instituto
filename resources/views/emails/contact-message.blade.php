<x-mail::message>
    # 📩 Nuevo mensaje de contacto

    Has recibido un nuevo mensaje desde el sitio web del **Instituto Von Humboldt**.

    ---

    | Campo | Detalle |
    |-----------|----------------------|
    | **Nombre** | {{ $nombre }} |
    | **Email** | {{ $email }} |
    | **Teléfono** | {{ $telefono }} |

    **Mensaje:**

    {{ $mensaje }}

    ---

    > Puedes responder directamente a este correo para contestarle a **{{ $nombre }}**.

    <x-mail::button :url="'mailto:' . $email" color="primary">
        Responder a {{ $nombre }}
    </x-mail::button>

    Atentamente,<br>
    **Instituto Von Humboldt**
</x-mail::message>