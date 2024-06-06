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
        <form method="GET" action='/{{$task->id}}' class="hidden">
            @csrf
            <button type="submit" class="edit-btn" >Edit</button>
        </form>
        
        <form method="POST" action='/{{$task->id}}' class="hidden">
            @csrf
            @method('DELETE')
            <button type="submit">Delete</button>
        </form>
    </div>
    @endforeach 
     
    <form id='add-task'method="POST" action="/" id="add-form"> 
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
   
    <br>
</body>
<script>
    editBtns = document.querySelectorAll('.edit-btn');
    cancelBtn = document.getElementById('cancel-btn');
    updateForm = document.getElementById('update-form');
    addForm = document.getElementById('add-form');

    for (let i = 0; i < editBtns.length; i++) {
     editBtns[i].addEventListener("click", function() {
        if(updateForm.style.display = 'none'){
            console.log('here..')
            updateForm.style.display = 'block'
        }else{
            updateForm.style.display = 'none'
        }
     });

    cancelBtn.addEventListener('click', function (){
        if(updateForm.style.display = 'block'){
            console.log('here..')
            updateForm.style.display = 'none'
        }else{
            updateForm.style.display = 'block'
        }
    }) 
 }
   


</script>
</html>