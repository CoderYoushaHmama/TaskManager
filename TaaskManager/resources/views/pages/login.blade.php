<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width,initial-scale=1.0"/>
        <link rel="stylesheet" href="{{URL::asset('./CSS/login.css')}}"/>
        <title>Login</title>
    </head>
    <body>
        <h1 class="title">Login</h1>
        <hr/>
        @if (Session::has('error'))
            <div class="error">{{Session::get('error')}}</div>
        @endif
        <form action="{{route('login')}}" method="POST">
            @error('email')
                <div class="error">{{$message}}</div>
            @enderror
            @error('password')
                <div class="error">{{$message}}</div>
            @enderror
            @csrf
            <input name="email" type="email" placeholder="Enter your email"/>
            <input name="password" type="password" placeholder="Enter your password"/>
            <button type="submit">login</button>
        </form>
        <div class="btn-div">
            <a href="{{route('reg')}}">Create new account</a>
        </div>
    </body>
</html>