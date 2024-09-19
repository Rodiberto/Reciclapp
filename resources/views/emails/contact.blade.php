<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Mensaje de Contacto</title>
</head>
<body>
    <h2>Tienes un nuevo mensaje de contacto</h2>

    <p><strong>Nombre:</strong> {{ $contactMessage->name }}</p>
    <p><strong>Email:</strong> {{ $contactMessage->email }}</p>
    <p><strong>Asunto:</strong> {{ $contactMessage->subject }}</p>
    <p><strong>Mensaje:</strong> {{ $contactMessage->message }}</p>

    <p>Por favor, responde a este mensaje lo antes posible.</p>
</body>
</html>
