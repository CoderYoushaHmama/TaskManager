<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width,initial-scale=1.0"/>
        <link rel="stylesheet" href="{{URL::asset('./CSS/create_task.css')}}"/>
        <title>Edit Task</title>
    </head>
    <body>
        <header>
            <a id="create"><div class="edit">create</div></a>
            <a href="{{route('main_page')}}"><div class="remove">cancel</div></a>
        </header>
        <section class="task-section">
            @error('title')
                <div class="error">{{$message}}</div>
            @enderror
            @error('text')
                <div class="error">{{$message}}</div>
            @enderror
            <form id="form" action="{{route('create')}}" method="POST">
                @csrf
                <input name="title" type="text" placeholder="title">
                <textarea name="text" class="task" placeholder="enter your task"></textarea>
            </form>
        </section>

        <script>
            var create = document.getElementById('create');
            var form = document.getElementById('form');
            create.addEventListener('click',()=>{
                form.submit();
            });
        </script>
    </body>
</html>