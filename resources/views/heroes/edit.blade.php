@extends('layouts.main')

@section('container')
<div class="container">
    <div class="page-inner">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
            <div>
                <h3 class="fw-bold mb-3">Edit Hero Section</h3>
                <h6 class="text-muted mb-2">Update the Hero section of your landing page</h6>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('heroes.update', $hero) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group mb-3">
                        <label for="name" class="form-label">Name <span class="text-danger">*</span></label>
                        <input type="text" name="name" class="form-control" 
                            value="{{ old('name', $hero->name) }}" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="subname" class="form-label">Subname</label>
                        <input type="text" name="subname" class="form-control" 
                            value="{{ old('subname', $hero->subname) }}">
                    </div>

                    <div class="form-group mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea name="description" rows="4" class="form-control">{{ old('description', $hero->description) }}</textarea>
                    </div>

                    <div class="form-group mb-3">
                        <label for="image" class="form-label">Hero Image</label>
                        @if($hero->image)
                            <div class="mb-2">
                                <img src="{{ asset('storage/' . $hero->image) }}" alt="Current Hero Image" width="200">
                            </div>
                        @endif
                        <input type="file" name="image" class="form-control">
                        <small class="text-muted">Leave empty if you don't want to change the image.</small>
                    </div>

                    <button type="submit" class="btn btn-primary">Update Hero</button>
                    <a href="{{ route('heroes.index') }}" class="btn btn-secondary">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
