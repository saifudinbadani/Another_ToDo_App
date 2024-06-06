<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/app.css">
    <title>Update Task</title>
</head>
<body>
    <form action="/{{$task->id}}" method="POST" id="update-form">
        @csrf
        @method('PATCH')
        <input type="text" name="title" value="{{$task->title}}"></input>
        <input type="text" name="description" value="{{$task->description}}"></input>
        {{-- show the priority value from database as default selected and show other twos in option --}}
        <select id="priority" name="priority" >
            @if ($task->priority === 'high')
            <option value="low">Low</option>
            <option value="medium">Medium</option>
            <option value="high" selected>High</option>
            @elseif ($task->priority === 'medium')
            <option value="low">Low</option>
            <option value="medium" selected>Medium</option>
            <option value="high">High</option>
            @else
            <option value="low">Low</option>
            <option value="medium">Medium</option>
            <option value="high">High</option>
            @endif

            
        </select>
        <button type="submit">Update</button>
        <a href="/" id="cancel-btn">Cancel</a>
    </form>
</body>
</html>