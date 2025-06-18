@extends('layouts.app')

@section('title', 'Task #'.$task->id)

@section('content')
<div class="card border-dark w-100">
    <h4 class="card-header"><b>{{ $task->title }}</b></h4>
    <div class="card-body">
        <h5 class="card-title">{{ $task->description }}</h5>
        @if ($task->long_description)
        <p class="card-text">{{ $task->long_description }}</p>
        @endif
    </div>
    <div class="card-footer">
        <small class="text-body-secondary">Created at {{ $task->created_at }} </small><br>
        <small class="text-body-secondary">Updated at {{ $task->updated_at }} </small>
    </div>
</div>
<br>
<!-- Align buttons horizontally on the right -->
<div class="d-flex" style="justify-content: flex-end;">
    <a style="margin-right: 10px;" href="{{ route('tasks.edit', ['task' => $task->id]) }}" class="btn btn-primary">Edit</a>
    <form style="display:inline; margin-right: 10px;" action="{{ route('tasks.destroy', ['task' => $task->id]) }}" method="post">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Delete</button>
    </form>
    <a style="margin-right:  10px;" href="{{ route('tasks.index') }}" class="btn btn-secondary">Back</a>
</div>
<br>
@endsection