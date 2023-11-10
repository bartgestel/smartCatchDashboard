<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Smartcatch | Home</title>
</head>
<body>
    @auth
        <form action="/logout" method="POST">
            @csrf
            <button>Logout</button>
        </form>
        @foreach($boats as $boat)
            <a href="boats/{{$boat['id']}}">{{$boat['name']}}</a>
        @endforeach
    @else
        <h1>You are not logged in</h1>
    @endauth
</body>
</html>
