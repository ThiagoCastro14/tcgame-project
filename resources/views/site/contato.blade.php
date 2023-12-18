<!DOCTYPE html>
<html>
<head>
    <title>Fale Conosco</title>
</head>
<body>

<h1>Fale Conosco</h1>

@if(session('success'))
    <div style="color: green;">{{ session('success') }}</div>
@endif

<form action="{{ route('contato.send') }}" method="post">
    @csrf
    <label for="name">Nome:</label>
    <input type="text" name="name" required>

    <br>

    <label for="email">E-mail:</label>
    <input type="email" name="email" required>

    <br>

    <label for="message">Mensagem:</label>
    <textarea name="message" required></textarea>

    <br>

    <button type="submit">Enviar</button>
</form>

</body>
</html>
