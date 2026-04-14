<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
</head>
<body>    
    <form method="POST" action="{{ route('singIn') }}">
        @csrf
        <div>
            <label for="name">Usuario:</label>
            <input type="text" id="name" name="name" required>
        </div>

        <div>
            <label for="password">Senha:</label>
            <input type="password" required>
        </div>
        
        <button type="submit">Entrar</button>
    </form>

    <a href="{{ route('register') }}">Registrar-se</a>
</body>
</html>