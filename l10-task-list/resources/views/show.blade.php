@extends('layouts.app')

@section('title', 'Task #'.$task->id)

@section('content')
    <div class="card border-dark w-50" >
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
@endsection