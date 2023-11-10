<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Smartcatch | Boat</title>
    @auth
        <form action="/logout" method="POST">
            @csrf
            <button>Logout</button>
        </form>
        <h1>{{$boat['name']}}</h1>
        <h1>{{$weight}} kg in total</h1>

        @foreach($catch as $caught)
            <h1>{{$caught['id']}}</h1>
            <p>{{$caught['weight']}}</p>
            <p>{{$caught['date']}}</p>
        @endforeach
    @else

    @endauth
</head>
<body>

</body>
</html>
