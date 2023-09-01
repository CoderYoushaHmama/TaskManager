<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width,initial-scale=1.0"/>
        <link rel="stylesheet" href="{{URL::asset('./CSS/edit_task.css')}}"/>
        <title>Edit Task</title>
    </head>
    <body>
        <header>
            <a id="save"><div class="edit">save</div></a>
            <a href="{{route('task_page',$task->id)}}"><div class="remove">cancel</div></a>
        </header>
        <section class="task-section">
            @error('title')
                <div class="error">{{$message}}</div>
            @enderror
            @error('text')
                <div class="error">{{$message}}</div>
            @enderror
            <form id="form" action="{{route('edit',$task->id)}}" method="POST">
                @csrf
                <input name="title" type="text" placeholder="title" value="{{$task->title}}">
                <textarea name="text" class="task" placeholder="enter your task">{{$task->object}}</textarea>
            </form>
        </section>

        <script>
            var form = document.getElementById('form');
            var save = document.getElementById('save');
            save.addEventListener('click',()=>{
                form.submit();
            });
        </script>
    </body>
</html>