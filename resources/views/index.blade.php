<!doctype html>
<html lang="en">
<head>
    <title>Smart Catch</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Website for Smart Catch">
    <meta name="author" content="Safa Hassan">
    <link rel="stylesheet" href="{{URL::asset('css/style_inlog.css')}}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Rozha+One">
</head>
<body>


    @auth
        <form action="/logout" method="POST">
            @csrf
            <button>Logout</button>
        </form>
    @else
        <div class="container">
            <div class="logo">
                <img src="{{URL::asset('img/logo.png')}}" alt="Smart Catch">
            </div>


            <div class="form-container">
                <form action="/login" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="loginName">Username</label>
                        <input type="text" id="loginName" name="loginName" placeholder="Your username" required>
                    </div>

                    <div class="form-group">
                        <label for="loginPass">Password</label>
                        <input type="password" id="loginPass" name="loginPass" placeholder="Password" required>
                    </div>
                    <div class="form-group" id="button-container">
                        <button class="button button1" id="form-button">Login</button>
                    </div>
                </form>
            </div>
        </div>
    @endauth
</body>
</html>
