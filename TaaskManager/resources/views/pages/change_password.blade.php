<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width,initial-scale=1.0"/>
        <link rel="stylesheet" href="{{URL::asset('./CSS/edit_profile.css')}}"/>
        <title>Edit Password</title>
    </head>
    <body>
        <h1 class="title">Edit password</h1>
        <hr/>
        @if (Session::has('error'))
            <div class="error">{{Session::get('error')}}</div>
        @endif
        @error('old_password')
            <div class="error">{{$message}}</div>
        @enderror
        @error('new_password')
            <div class="error">{{$message}}</div>
        @enderror
        @error('new_password2')
            <div class="error">{{$message}}</div>
        @enderror
        <form action="{{route('edit_pass')}}" method="POST">
            @csrf
            <input name="old_password" type="password" placeholder="Enter old password"/>
            <input name="new_password" type="password" placeholder="Enter your new password"/>
            <input name="new_password2" type="password" placeholder="Enter your new password again"/>
            <button type="submit">save</button>
        </form>
        <div class="btn-div">
            <a href="{{route('main_page')}}">return to main page</a>
        </div>
    </body>
</html>