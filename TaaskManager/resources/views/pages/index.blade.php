<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width,initial-scale=1.0"/>
        <link rel="stylesheet" href="{{URL::asset('./CSS/index.css')}}"/>
        <title>Main Page</title>
    </head>
    <body>
        <h1 class="title">Your Tasks<div id="profile_btn" class="profile"><img src="{{URL::asset('./IMAGES/user.jpg')}}"/></div></h1>
        <hr/>
        <section class="task-section">
            @foreach ($tasks as $task)
                <form method="POST" class="form{{$task->id}}" action="{{route('accept',$task->id)}}">
                    @csrf
                    <a href="{{route('task_page',$task->id)}}"><div class="task">
                        @if ($task->accepted)
                            <input class="check{{$task->id}}" type="checkbox" checked/>
                            @else
                            <input class="check{{$task->id}}" type="checkbox"/>
                        @endif
                        <button type="submit" class="btn"></button>
                        <h2 class="task-title">{{$task->title}}</h2>
                    </div></a>
                </form>
            @endforeach
        </section>
        <a href="{{route('create_task')}}"><div class="create_new">+</div></a>
        <section class="profile-section" id="profile">
            <div class="return" id="return">back</div>
            <div class="image">
                <img src="../IMAGES/user.jpg"/>
            </div>
            <h1>{{$user->name}}</h1>
            <h2>{{$user->email}}</h2>
            <a href="{{route('edit_profile')}}" class="edit"><button>Edit profile</button></a>
            <a href="{{route('logout')}}" class="logout"><button>Logout</button></a>
        </section>

        <script src="{{URL::asset('./JS/profile.js')}}"></script>
    </body>
</html>