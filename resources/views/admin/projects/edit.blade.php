@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1>Edit Project</h1>
        <form action="{{ route('admin.projects.update', $project->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $project->title }}" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" required>{{ $project->description }}</textarea>
            </div>
            <div class="mb-3">
                <label for="slug" class="form-label">Slug</label>
                <input type="text" class="form-control" id="slug" name="slug" value="{{ $project->slug }}"
                    required>
            </div>
            <label for="type_id">Type:</label>
            <select name="type_id" id="type_id">
                <option value="">Select Type...</option>
                <option value="1" {{ $project->type_id == 1 ? 'selected' : '' }}>Type 1</option>
                <option value="2" {{ $project->type_id == 2 ? 'selected' : '' }}>Type 2</option>
                <option value="3" {{ $project->type_id == 3 ? 'selected' : '' }}>Type 3</option>
            </select>

            <label for="technologies">Technologies:</label>
            <select name="technologies[]" id="technologies" multiple>
                <option value="1" {{ $project->technologies->contains(1) ? 'selected' : '' }}>Technology 1</option>
                <option value="2" {{ $project->technologies->contains(2) ? 'selected' : '' }}>Technology 2</option>
                <option value="3" {{ $project->technologies->contains(3) ? 'selected' : '' }}>Technology 3</option>
            </select>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
