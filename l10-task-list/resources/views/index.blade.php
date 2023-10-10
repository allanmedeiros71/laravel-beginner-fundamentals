@extends('layouts.app')

@section('title', 'List of tasks ')

@section('content')
    <ul class="list-group">
      @forelse ($tasks as $task)
        <li class="list-group-item"><a href="{{ route('tasks.show', ['id'=> $task->id]) }}"><i class="fa-brands fa-odysee"></i></a> {{ $task->title }}</li>
      @empty
        <div>There are no tasks</div>
      @endforelse
    </ul>
@endsection