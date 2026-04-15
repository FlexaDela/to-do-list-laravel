<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
</head>
<body>
    @if ($errors->has('email'))
        <div style="color: red;">
            {{ $errors->first('email') }}
        </div>
    @endif    
    <form method="POST" action="{{ route('singIn') }}">
        @csrf
        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
        </div>

        <div>
            <label for="password">Senha:</label>
            <input type="password" id="password" name="password" required>
        </div>
        
        <button type="submit">Entrar</button>
    </form>

    <a href="{{ route('register') }}">Registrar-se</a>
</body>
</html>