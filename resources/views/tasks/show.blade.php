<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Task') }}
        </h2>
    </x-slot>
    
        <div class="row mt-3">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{$task->title}}</h5>
                        <p class="card-text"><strong>Description:</strong> {{$task->description}}</p>
                        <p class="card-text"><strong>Created To:</strong> {{$task->user->name}}</p>
                        <p class="card-text"><strong>Priority:</strong> {{$task->priority->name}}</p>
                        <p class="card-text"><strong>Status:</strong> {{$task->status == 1 ? 'Active' : 'Complected'}}</p>
                        <p class="card-text"><strong>Deadline:</strong> {{$task->deadline}}</p>
                    </div>
                    <div class="card-footer ">
                        <small class="text-muted">Task ID: {{$task->id}}</small>
                    </div>
                </div>
            </div>
        </div>
        <div><a href="{{route('task.edit', $task->id)}}" class="btn btn-primary mt-3 ml-3">Edit</a></div>
        <form action="{{route('task.destroy', $task->id)}}" method="post">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-danger mt-3 ml-3">Delete</button> 
        </form>
        <div><a href="{{route('task.index')}}" class="btn btn-primary mt-3 ml-3">Back</a></div>
    </div>
</x-app-layout>