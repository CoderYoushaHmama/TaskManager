<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width,initial-scale=1.0"/>
        <link rel="stylesheet" href="{{URL::asset('./CSS/register.css')}}"/>
        <title>Register</title>
    </head>
    <body>
        <h1 class="title">Register</h1>
        <hr/>
        @if (Session::has('error'))
            <div class="error">{{Session::get('error')}}</div>
        @endif
        <form action="{{route('register')}}" method="POST">
            @csrf
            @error('password')
            <div class="error">{{$message}}</div>
            @enderror
            @error('email')
            <div class="error">{{$message}}</div>
            @enderror
            @error('name')
            <div class="error">{{$message}}</div>
            @enderror
            <input name="name" type="text" placeholder="Enter your name"/>
            <input name="email" type="email" placeholder="Enter your email"/>
            <input name="password" type="password" placeholder="Enter your password"/>
            <input name="sure_password" type="password" placeholder="Enter your password again"/>
            <button type="submit">create</button>
        </form>
        <div class="btn-div">
            <a href="{{route('log')}}">I have an account</a>
        </div>
    </body>
</html>