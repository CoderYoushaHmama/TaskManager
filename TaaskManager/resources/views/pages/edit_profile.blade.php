<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width,initial-scale=1.0"/>
        <link rel="stylesheet" href="{{URL::asset('./CSS/edit_profile.css')}}"/>
        <title>Edit Profile</title>
    </head>
    <body>
        <h1 class="title">Edit profile</h1>
        <hr/>
        @error('name')
            <div class="error">{{$message}}</div>
        @enderror
        <form action="{{route('edit_name')}}" method="POST">
            @csrf 
            <input name="name" type="text" placeholder="Enter your name" value="{{$user->name}}"/>
            <button type="submit">save</button>
        </form>
        <div class="btn-div">
            <a href="{{route('edit_password')}}">Change password</a>
        </div>
        <div class="btn-div">
            <a href="{{route('main_page')}}">return to main page</a>
        </div>
    </body>
</html>