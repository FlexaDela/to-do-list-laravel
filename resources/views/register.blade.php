<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRIAR CONTA</title>
</head>
<body>    
    <form method="POST" action="{{ route('registerConfirm') }}">
        @csrf
        <div>
            <label for="name">Usuario:</label>
            <input type="text" id="name" name="name" required>
        </div>

        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
        </div>

        <div>
            <label for="password">Senha:</label>
            <input type="password" id='password' name='password' required>
        </div>
        
        <button type="submit">CRIAR</button>
    </form>

    <a href="{{ route('login') }}">login</a>
</body>
</html>