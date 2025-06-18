@extends('layouts.app')

@section('title', 'Edit Task')

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
    <form action="{{ route('tasks.update', ['task'=> $task->id]) }}" method="post">
        @csrf
        @method('PUT')
        <div>
            <label for="title" class="form-label">Título</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ $task->title }}">
            @error('title')
                <p class="error-message"> {{ $message }} </p>
            @enderror
        </div>
        <div>
            <label for="description" class="form-label">Descrição</label>
            <textarea name="description" id="description" rows="5" class="form-control">{{ $task->description }}</textarea>
            @error('description')
                <p class="error-message"> {{ $message }} </p>
            @enderror
        </div>
        <div>
            <label for="long_description" class="form-label">Descrição Longa</label>
            <textarea name="long_description" id="long_description" rows="10" class="form-control">{{ $task->long_description }}</textarea>
            @error('long_description')
                <p class="error-message"> {{ $message }} </p>
            @enderror
        </div>
        <br>
        <div class="d-flex" style="justify-content: flex-end;">
            <button type="submit" class="btn btn-primary" style="margin-right: 10px;">Update</button>
            <form style="display:inline; margin-right: 10px;" action="{{ route('tasks.destroy', ['task' => $task->id]) }}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" style="margin-right: 10px;">Delete</button>
            </form>
            <a href="{{ route('tasks.index') }}" class="btn btn-secondary" style="margin-right: 10px;">Back</a>
        </div>
    </form>
@endsection