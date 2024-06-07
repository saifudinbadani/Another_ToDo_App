<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/app.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>To-Do App</title>
</head>

<body>
    <h1 class="text-center text-3xl font-semibold mb-4">Another To Do App</h1>
    <div class="box-border p-4 border-4 flex flex-col gap-y-1">
        <div class="flex flex-row gap-x-2">
            <span class="w-20 px-px">Title</span>
            <span class="w-32 px-px">Description</span>
            <span class="w-20 px-px">Priority</span>
            <span class="w-20 px-px">Completed</span>
        </div>

        @foreach($tasks as $task)
        <div class="container flex flex-row gap-x-2">
            <span class="w-20 px-px">{{ $task->title }}</span>
            <span class="w-32 px-px">{{ $task->description }}</span>
            <span class="w-20 px-px">{{ $task->priority }}</span>
            <input type="checkbox" class="w-20 px-px mr-10">
            <button type="submit" class="edit-btn hover:underline" data-task-id="{{ $task->id }}">Edit</button>

            <form method="POST" action='/{{$task->id}}'>
                @csrf
                @method('DELETE')
                <button type="submit" class="rounded bg-red-600 text-white px-1.5">Delete</button>
            </form>
        </div>

        <!-- Update form for each task, uniquely identified -->
        <form action="/{{$task->id}}" method="POST" id="update-form-{{$task->id}}" hidden>
            @csrf
            @method('PATCH')
            <p class="block text-xl">Update task</p>
            <input class="rounded-md border-2 px-px mx-2" type="text" name="title" value="{{$task->title}}"></input>
            <input class="rounded-md border-2 px-px mx-2" type="text" name="description"
                value="{{$task->description}}"></input>
            {{-- show the priority value from database as default selected and show other twos in option --}}
            <select class="rounded-md border-2 px-px mx-2" id="priority" name="priority">
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
            <button type="submit"
                class="rounded-md bg-indigo-600 px-1.5 py-1.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Update</button>
             <a href="#" class="hover:underline cancel-btn" data-task-id="{{ $task->id }}">Cancel</a>
        </form>
        @endforeach
    </div>

    <form class='box-border p-4 border-4 mt-3' method="POST" action="/" id="add-form">
        @csrf

        <input class="rounded-md border-2 px-px mx-2" type="text" name="title" placeholder="title"></input>

        <input class="rounded-md border-2 px-px mx-2" type="text" name="description" placeholder="description"></input>

        <select class="rounded-md border-2 px-px mx-2" id="priority" name="priority">
            <option value="low">Low</option>
            <option value="medium">Medium</option>
            <option value="high">High</option>
        </select>
        <button type="submit"
            class="rounded-md bg-indigo-600 px-1.5 py-1.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Add</button>
    </form>
    <br>
</body>
<script>
    document.querySelectorAll('.edit-btn').forEach(btn => {
    btn.addEventListener("click", function() {
        const taskId = btn.getAttribute('data-task-id');
        const form = document.getElementById(`update-form-${taskId}`);
        form.style.display = 'block';
    });
});

document.querySelectorAll('.cancel-btn').forEach(btn => {
    btn.addEventListener("click", function() {
        const taskId = btn.getAttribute('data-task-id');
        const form = document.getElementById(`update-form-${taskId}`);
        form.style.display = 'none';
    });
});
//     editBtns = document.querySelectorAll('.edit-btn');
//     cancelBtn = document.getElementById('cancel-btn');
//     updateForm = document.getElementById('update-form');
//     addForm = document.getElementById('add-form');

//     for (let i = 0; i < editBtns.length; i++) {
//      editBtns[i].addEventListener("click", function(e) {
//         e.preventDefault();
//         // console.log(editBtns[i].dataset.id);
//         if(updateForm.style.display = 'none'){
//             // console.log('here..')
//             updateForm.style.display = 'block'
//         }else{
//             updateForm.style.display = 'none'
//         }
//      });

//     cancelBtn.addEventListener('click', function (){
//         if(updateForm.style.display = 'block'){
//             console.log('here..')
//             updateForm.style.display = 'none'
//         }else{
//             updateForm.style.display = 'block'
//         }
//     }) 
//  }
   


</script>

</html>