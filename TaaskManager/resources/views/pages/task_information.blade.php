<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width,initial-scale=1.0"/>
        <link rel="stylesheet" href="{{URL::asset('./CSS/task_information.css')}}"/>
        <title>Task</title>
    </head>
    <body>
        <header>
            <a href="{{route('edit_task_page',$task->id)}}"><div class="edit">edit</div></a>
            <form method="POST" action="{{route('delete',$task->id)}}">
                @csrf
                <button type="submit" class="remove">remove</button>
            </form>
            <a href="{{route('main_page')}}">return</a>
        </header>
        <h1 class="title">{{$task->title}}</h1>
        <section class="task-section">
            <pre class="task">{{$task->object}}</pre>
        </section>
    </body>
</html>