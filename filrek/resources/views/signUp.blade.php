<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filrek</title>
    <link rel="icon" href="{{ asset('images/filrek-favicon.ico') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
    <!--Navbar-->
    <header class="header">
        <a href="/" class="logo"><img src="{{ asset('images/logo_filrek.svg') }}" alt="">FILREK</a>
        <nav class="navbar">
            <a href="{{ route('signIn') }}">Sign In</a>
            <a href="{{ route('signUp') }}">Sign Up</a>
        </nav>
    </header>
    <!--Wrapper-->
    <div class="wrapper">
        <!--Form-->
        <form action="{{ route('startSignUp') }}" method="post">
            @csrf
            @method('post')
            <h1>Sign Up</h1>
            @foreach ($errors->all() as $e)
                <center>
                    <p>{{ $e }}</p>
                </center>
            @endforeach
            @if (session()->has('msg'))
                <center>
                    <p>{{ session('msg') }}</p>
                </center>
            @endif
            <!--Textbox Email-->
            <div class="input-box">
                <input name="email" type="text" placeholder="Email" required>
                <i class='bx bx-envelope'></i>
            </div>
            <!--Textbox Username-->
            <div class="input-box">
                <input name="username" type="text" placeholder="Username" required>
                <i class='bx bx-user'></i>
            </div>
            <!--Textbox Password-->
            <div class="input-box">
                <input name="password" type="password" placeholder="Password" required>
                <i class='bx bx-lock-alt'></i>
            </div>
            <!--Sign In Button-->
            <button type="submit" class="btn">Sign Up</button>
            <!--warning text-->
            <div class="register-acc">
                <p>Already have an account?
                    <a href="{{ route('signIn') }}">Sign In</a>
                </p>
            </div>
        </form>
    </div>
</body>

</html>
