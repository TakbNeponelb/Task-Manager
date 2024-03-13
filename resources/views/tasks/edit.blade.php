<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit task') }}
        </h2>
    </x-slot>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="container mt-5">

        <form action="{{route('task.update', $task->id)}}" method="post">
            @csrf
            @method('patch')

            <div class="mb-3">
                <label for="title" class="form-label">Title:</label>
                <input type="text" class="form-control" id="title" name="title" value="{{$task->title}}">
            </div>
            
            <div class="mb-3">
                <label for="description" class="form-label">Description:</label>
                <textarea class="form-control" id="description" name="description" rows="4">{{$task->description}}</textarea>
            </div>
            
            <div class="mb-3">
                <label for="created_to" class="form-label">Created to:</label>
                <select class="form-control" id="created_to" name="created_to">
                    @foreach ($users as $user)
                        <option {{$user->id == $task->created_to ? ' selected' : ''}} value="{{$user->id}}">
                            {{ $user->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            
            <div class="mb-3">
                <label for="priority_id" class="form-label">Priority:</label>
                <select class="form-select" id="priority_id" name="priority_id">
                    @foreach ($priorities as $priority)
                        <option {{$priority->id == $task->priority->id ? ' selected' : ''}} value="{{$priority->id}}">
                            {{ $priority->name }}
                        </option>
                    @endforeach
                </select>
            </div>            
            
            <div class="mb-3">
                <label for="status" class="form-label">Status:</label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="status" id="statusTodo" value="1" {{ $task->status == 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="statusTodo">Active</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="status" id="statusDone" value=21" {{ $task->status == 2   ? 'checked' : '' }}>
                    <label class="form-check-label" for="statusDone">Completed</label>
                </div>
            </div>
            
            
            <div class="mb-3">
                <label for="deadline" class="form-label">Deadline:</label>
                <input type="date" class="form-control" id="deadline" name="deadline" value="{{$task->deadline}}">
            </div>
            
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

</x-app-layout>