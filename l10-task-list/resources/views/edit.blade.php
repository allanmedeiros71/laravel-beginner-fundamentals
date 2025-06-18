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
    <form action="{{ route('tasks.update', ['id'=> $task->id]) }}" method="post">
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
        <div>
            <button type="submit">Update Task </button>
        </div>
    </form>
@endsection