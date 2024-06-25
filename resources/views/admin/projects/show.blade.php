{{-- @extends('layouts.admin')

@section('content')
    <h1>{{ $project->title }}</h1>
    <p>{{ $project->description }}</p>
    @if ($project->type)
        <p><strong>Type:</strong> {{ $project->type->name }}</p>
    @else
        <p><strong>Type:</strong> None</p>
    @endif
    <a href="{{ route('admin.projects.index') }}" class="btn btn-primary">Back to Projects</a>
@endsection --}}
