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
                @foreach ($types as $type)
                    <option value="{{ $type->id }}" {{ $project->type_id == $type->id ? 'selected' : '' }}>
                        {{ $type->name }}</option>
                @endforeach
            </select>

            <label for="technologies">Technologies:</label>
            <select name="technologies[]" id="technologies" multiple>
                @foreach ($technologies as $technology)
                    <option value="{{ $technology->id }}"
                        {{ $project->technologies->contains($technology->id) ? 'selected' : '' }}>
                        {{ $technology->name }}
                    </option>
                @endforeach
            </select>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
