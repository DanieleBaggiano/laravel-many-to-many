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
            <option value="1">Type 1</option>
            <option value="2">Type 2</option>
            <option value="3">Type 3</option>
        </select>

        <label for="technologies">Technologies:</label>
        <select name="technologies[]" id="technologies" multiple>
            <option value="1">Technology 1</option>
            <option value="2">Technology 2</option>
            <option value="3">Technology 3</option>
        </select>

        <button type="submit">Create</button>
    </form>
@endsection
