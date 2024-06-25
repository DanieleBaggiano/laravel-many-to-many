@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <h1 class="mt-4">Projects</h1>
        <div class="mb-3">
            <a href="{{ route('admin.projects.create') }}" class="btn btn-primary">Create New Project</a>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Slug</th>
                                <th>Type</th>
                                <th>Technologies</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($projects as $project)
                                <tr>
                                    <td>{{ $project->title }}</td>
                                    <td>{{ $project->description }}</td>
                                    <td>{{ $project->slug }}</td>
                                    <td>{{ $project->type ? $project->type->name : 'None' }}</td>
                                    <td>
                                        @if ($project->technologies->isNotEmpty())
                                            @foreach ($project->technologies as $technology)
                                                <span class="badge bg-secondary">{{ $technology->name }}</span>
                                            @endforeach
                                        @else
                                            None
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.projects.edit', $project->id) }}"
                                            class="btn btn-sm btn-primary">Edit</a>
                                        <form action="{{ route('admin.projects.destroy', $project->id) }}" method="POST"
                                            style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger"
                                                onclick="return confirm('Are you sure you want to delete this project?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
