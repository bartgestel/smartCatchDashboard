<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Smartcatch | Register</title>
</head>
<body>
    <div id="registerContainer">
        <form action="/register" method="POST">
            @csrf
            <input type="text" name="registerName" id="registerName" placeholder="Username">
            <input type="email" name="registerEmail" id="registerEmail" placeholder="Email">
            <input type="password" name="registerPass" id="registerPass" placeholder="Password">
            <button>Register</button>
        </form>
    </div>
</body>
</html>
