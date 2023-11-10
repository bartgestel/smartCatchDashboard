<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Smartcatch | Login</title>
</head>
<body>
    @auth
        <h1>You are logged in</h1>
        <form action="/logout" method="POST">
            @csrf
            <button>Logout</button>
        </form>
    @else
        <div id="loginContainer">
            <form action="/login" method="POST" id="loginForm">
                @csrf
                <input type="text" name="loginName" placeholder="Username" id="loginUser">
                <input type="password" name="loginPass" placeholder="Password" id="loginPass">
                <button>Login</button>
            </form>
        </div>
    @endauth
</body>
</html>
