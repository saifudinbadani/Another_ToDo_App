<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/app.css">
    <title>To-Do App</title>
</head>

<body>
    <h1>Another To Do App</h1>
    @foreach($tasks as $task)
    <div class="task-container">
        <span>{{ $task->title }}</span>
        <span>{{ $task->description }}</span>
        <span>{{ $task->priority }}</span>
        <span>{{ $task->isItDone }}</span>
        <input type="checkbox">
        <button type="button" >Edit</button>
        <form method="POST" action='/{{$task->id}}' class="hidden">
            @csrf
            @method('DELETE')
            <button type="submit">Delete</button>
        </form>
    </div>
    @endforeach 
     
    <form method="POST" action="/">
        @csrf
        <input type="text" name="title" placeholder="title"></input>
        <input type="text" name="description" placeholder="description"></input>
        <select id="priority" name="priority">
            <option value="low">Low</option>
            <option value="medium">Medium</option>
            <option value="high">High</option>
        </select>
        <button type="submit">Add</button>
    </form>
</body>

</html>