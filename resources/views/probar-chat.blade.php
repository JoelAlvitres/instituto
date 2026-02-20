<!DOCTYPE html>
<html>
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>

<input type="text" id="mensaje" placeholder="Escribe algo">
<button onclick="enviar()">Enviar</button>

<p id="respuesta"></p>

<script>
function enviar() {
    fetch('/api/chat', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({
            message: document.getElementById('mensaje').value
        })
    })
    .then(res => res.json())
    .then(data => {
    document.getElementById('respuesta').innerText = JSON.stringify(data);
});
}
</script>

</body>
</html>