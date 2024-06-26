@extends('layouts.admin')

@section('content')
    <h1>Create New Project</h1>
    <form action="{{ route('admin.projects.store') }}" method="POST">
        @csrf
        <label for="title">Title:</label>
        <input type="text" name="title" id="title" required>

        <label for="description">Description:</label>
        <textarea name="description" id="description" required></textarea>

        <label for="slug">Slug:</label>
        <input type="text" name="slug" id="slug" required>

        <label for="type_id">Type:</label>
        <select name="type_id" id="type_id">
            <option value="">Select Type...</option>
            @foreach ($types as $type)
                <option value="{{ $type->id }}">{{ $type->name }}</option>
            @endforeach
        </select>

        <label for="technologies">Technologies:</label>
        <select name="technologies[]" id="technologies" multiple>
            @foreach ($technologies as $technology)
                <option value="{{ $technology->id }}">{{ $technology->name }}</option>
            @endforeach
        </select>

        <button type="submit">Create</button>
    </form>
@endsection
