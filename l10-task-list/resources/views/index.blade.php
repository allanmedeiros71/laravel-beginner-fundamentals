@extends('layouts.app')

@section('title', 'List of tasks ')

@section('content')
    <ul class="list-group">
        <!-- Create a toolbar with a link to create a new task -->
        <div class="d-flex justify-content-between">
            <h1>Task List</h1>
            <a href="{{ route('tasks.create') }}" class="btn btn-primary">Add Task</a>
        </div>
        @forelse ($tasks as $task)
            <!-- Create an Button toolbar on the begin of the line to see details and edit -->
            <li class="list-group-item w-100">
                <div class="d-flex align-items-left align-items-center">
                    <div class="btn-group" role="group" aria-label="toolbar">
                        <a href="{{ route('tasks.show', ['task'=> $task->id]) }}" class="btn btn-light"><i class="fas fa-eye"></i></a>
                        <a href="{{ route('tasks.edit', ['task'=> $task->id]) }}" class="btn btn-light"><i class="fas fa-edit"></i></a>
                    </div>
                    <div style="margin-left: 10px">
                        {{ $task->title }}
                    </div>
                </div>
            </li>
        @empty
            <div>There are no tasks</div>
        @endforelse
    </ul>
@endsection