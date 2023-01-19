@include('header')
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <h2>Login</h2>
</head>
<body>
    @auth
    <p></p>
    @else
    <form action="/login" method="post">
    @csrf
    <input type="email" name="email" id="email" placeholder="email" value={{Cookie::get('mycookie') !== null ? Cookie::get('mycookie') : "" }}><br>
    <input type="password" name="password" id="password" placeholder="password"><br>
    <input type="checkbox" name="remember" id="remember" checked={{Cookie::get('mycookie') !== null }}> Remember Me  <br>
    <input type="submit" value="Login">
    </form>
    @endif
</body>
</html>