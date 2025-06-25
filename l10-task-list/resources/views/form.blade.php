

@extends('layouts.app')

@section('title', isset($task) ? 'Edit Task' : 'Add Task')

@section('styles')
    <style>
        .error-message {
            color:red;
            font-size: 0.8rem;
            margin-bottom: 10px;
        }
    </style>
@endsection

@section('content')
<form id="task-form" action="{{ isset($task) ? route('tasks.update', ['task'=> $task->id]) : route('tasks.store') }}" method="post">
    @csrf
    @method(isset($task) ? 'PUT' : 'POST')
    <div>
        <label for="title" class="form-label">Título</label>
        <input type="text" name="title" id="title" class="form-control" value="{{ $task->title ?? old('title') }}">
        @error('title')
        <p class="error-message"> {{ $message }} </p>
        @enderror
    </div>
    <div>
        <label for="description" class="form-label">Descrição</label>
        <textarea name="description" id="description" rows="5" class="form-control">{{ $task->description ?? old('description') }}</textarea>
        @error('description')
        <p class="error-message"> {{ $message }} </p>
        @enderror
    </div>
    <div>
        <label for="long_description" class="form-label">Descrição Longa</label>
        <textarea name="long_description" id="long_description" rows="10" class="form-control">{{ $task->long_description ?? old('long_description') }}</textarea>
        @error('long_description')
        <p class="error-message"> {{ $message }} </p>
        @enderror
    </div>
    <div>
        <label for="completed" class="form-label">{{ $task->completed ? 'Completed' : 'Not Completed' }}</label> <i class="{{ $task->completed ? 'fas fa-toggle-on' : 'fas fa-toggle-off' }}"></i>
    </div>
</form> 
    <br>
    <div class="d-flex" style="justify-content: flex-end; margin-top: 10px; gap: 10px;">
        <button type="submit" form="task-form" class="btn btn-primary" style="margin-right: 10px;">{{ isset($task) ? 'Update' : 'Add' }}</button>
        @if(isset($task))
            <form id="delete-form" action="{{ route('tasks.destroy', ['task' => $task->id]) }}" method="post" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" form="delete-form" class="btn btn-danger" style="margin-right: 10px;">Delete</button>
            </form>
        @endif
        <a href="{{ route('tasks.index') }}" class="btn btn-secondary" style="margin-right: 10px;">Back</a>
    </div>

@endsection