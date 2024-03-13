<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tasks List') }}
        </h2>
    </x-slot>

    <div class="container">
        <a href="{{ route('task.create') }}" class="btn btn-success mt-3">Add one</a>
        
        <form class="d-flex align-items-center" action="" method="GET">
            <div class="form-group mr-2">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="status" id="status-all" value="0" {{ old('status') == "0" ? 'checked' : ''}}>
                    <label class="form-check-label" for="status-all">All</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="status" id="status-active" value="1" {{ old('status') == "1" ? 'checked' : '' }}>
                    <label class="form-check-label" for="status-active">Active</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="status" id="status-completed" value="2" {{ old('status') == "2" ? 'checked' : '' }}>
                    <label class="form-check-label" for="status-completed">Completed</label>
                </div>
            </div>
        
            <button type="submit" class="btn btn-primary">Apply Filter</button>
        </form>
    </div>

    @foreach ($tasks as $task)
    <div class="row mt-3">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><a href="{{route('task.show', $task->id)}}">{{$task->title}}</a></h5>
                    <p class="card-text"><strong>Description:</strong> {{$task->description}}</p>
                    <p class="card-text"><strong>Deadline:</strong> {{$task->deadline}}</p>
                </div>
                <div class="card-footer ">
                    <small class="text-muted">Task ID: {{$task->id}}</small>
                </div>
            </div>
        </div>
    </div>
    @endforeach

    <div>
        {{$tasks->withQueryString()->links()}}
    </div>

</x-app-layout>