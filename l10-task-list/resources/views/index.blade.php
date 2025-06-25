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
                        <a href="{{ route('tasks.show', ['task'=> $task]) }}" class="btn btn-light" title="Show"><i class="fas fa-eye"></i></a>
                        <a href="{{ route('tasks.edit', ['task'=> $task]) }}" class="btn btn-light" title="Edit"><i class="fas fa-edit"></i></a>
                        <form action="{{ route('tasks.destroy', ['task'=> $task]) }}" method="post" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-light" title="Delete"><i class="fas fa-trash"></i></button>
                        </form>
                        <form action="{{ route('tasks.toggle-completed', ['task'=> $task]) }}" method="post" style="display:inline;">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn btn-light" title="Toggle Completed"><i class="{{ $task->completed ? 'fas fa-toggle-on' : 'fas fa-toggle-off' }}"></i></button>
                        </form>
                    </div>
                    <div style="margin-left: 10px">
                        @if ($task->completed)
                            <s>{{ $task->title }}</s>
                        @else
                            {{ $task->title }}
                        @endif
                    </div>
                </div>
            </li>
        @empty
            <div>There are no tasks</div>
        @endforelse
    </ul>
    <br>
    @if($tasks->hasPages())
        <div class="d-flex justify-content-center" style="margin-top: 10px;">
            {{ $tasks->links('pagination::bootstrap-5') }}
        </div>
    @endif
@endsection