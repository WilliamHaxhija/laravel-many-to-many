@extends('layouts.admin')

@section('content')
    <h2 class="my-3">Create a new Project</h2>

    <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Project Name</label>
            <input type="text" class="form-control" id="exampleInputPassword1" name="name" value="{{ old('name') }}">
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <label for="exampleInput" class="form-label">Client Name</label>
            <input type="text" class="form-control" id="exampleInput" name="client_name"
                value="{{ old('client_name') }}">
            @error('client_name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="mb-3">
                <label for="formFile" class="form-label">Image</label>
                <input class="form-control" type="file" id="formFile" name="cover_image">
            </div>

            <div class="mb-3">
                <label for="form-select" class="form-label">Types</label>
                <select id="form-select" class="form-select" aria-label="Default select example" name='type_id'>
                    <option value="">Select Type</option>
                    @foreach ($types as $type)
                        <option @selected($type->id == old('type_id')) value="{{ $type->id }}">{{ $type->name }}</option>
                    @endforeach
                </select>
                @error('type_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <h6>Technologies</h6>

                @foreach ($technologies as $technology)
                    <div class="form-check">
                        <input @checked(in_array($technology->id, old('technologies', []))) class="form-check-input" type="checkbox" value="{{ $technology->id }}" id="{{ $technology->id }}" name="technologies[]">
                        <label class="form-check-label" for="{{ $technology->id }}">{{ $technology->name }}</label>
                    </div>
                @endforeach
                @error('technologies')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            </div>

            <div class="mt-4">
                <label for="floatingTextarea2">Summary </label>
                <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" name="summary"
                    style="height: 100px">{{ old('summary') }}</textarea>
                @error('summary')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <button type="submit" class="btn btn-success"><i class="fa-regular fa-floppy-disk"></i></button>
        <a href="{{ route('admin.projects.index') }}" class="btn btn-primary btn-sm" tabindex="-1" role="button"
            aria-disabled="true"><i class="fa-regular fa-rectangle-list"></i></a>
    </form>
@endsection
