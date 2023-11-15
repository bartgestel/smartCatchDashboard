<!doctype html>
<html lang="en">
<head>
    <title>Smart Catch</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Website for Smart Catch">
    <meta name="author" content="Safa Hassan">
    <link rel="stylesheet" href="{{URL::asset('css/style.css')}}">
</head>
<body>
    @auth
        <div class="header">
            <div class="nav">
                    <img src="{{URL::asset('img/logo.png')}}" alt="Smart Catch" id="logo">
                <div id="nav-text">
                    <a href="/index">Home</a>
                    <div class="dropdown">
                        <a class="dropbtn">Select a ship</a>
                        <div class="dropdown-content">
                            @foreach($boats as $boat)
                                <a href="/boats/{{$boat['id']}}">{{$boat['name']}}</a>
                            @endforeach
                        </div>
                    </div>
                    <a href="/logout">Logout</a>
                </div>
            </div>
        </div>
        <div id="data-container">
            <h1>Total amount of fish caught this year</h1>
            <div>
                <p>{{$weightYear}}KG</p>
            </div>
        </div>
        <div class="dashboard-container">
            @foreach($boats as $boat)
                <div class="ship-card">
                    <a href="/boats/{{$boat['id']}}"><img src="{{URL::asset('img/boat1.png')}}" alt="Ship 2"></a>
                    <a id="boat-name" href="/boats/{{$boat['id']}}"><h1 >{{$boat['name']}}</h1></a>
                </div>
            @endforeach
        </div>
        <footer>
            <p>&copy; 2023 SmartCatch</p>
        </footer>
    @else
        <?php  return redirect('/')?>
    @endauth
</body>
</html>
