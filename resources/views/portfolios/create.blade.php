@extends('layouts.main')

@section('container')
    <div class="container">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Create Portfolio</h4>
                <ul class="breadcrumbs">
                    <li class="nav-home">
                        <a href="{{ route('dashboard') }}">
                            <i class="flaticon-home"></i>
                        </a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('portfolio.index') }}">Portfolio</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Create Portfolio</a>
                    </li>
                </ul>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Portfolio Information</div>
                        </div>
                        <form action="{{ route('portfolio.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="title">Title <span class="text-danger">*</span></label>
                                            <input type="text"
                                                class="form-control @error('title') is-invalid @enderror"
                                                id="title" name="title" value="{{ old('title') }}" required>
                                            @error('title')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="technologies">Technologies</label>
                                            <input type="text"
                                                class="form-control @error('technologies') is-invalid @enderror"
                                                id="technologies" name="technologies" value="{{ old('technologies') }}">
                                            @error('technologies')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea
                                        class="form-control @error('description') is-invalid @enderror"
                                        id="description" name="description" rows="4">{{ old('description') }}</textarea>
                                    @error('description')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="link">Link</label>
                                    <input type="url"
                                        class="form-control @error('link') is-invalid @enderror"
                                        id="link" name="link" value="{{ old('link') }}">
                                    @error('link')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>


                                <div class="form-group">
                                    <label>Portfolio Images</label>
                                    <small class="form-text text-muted mb-2">You can upload up to 5 images (max 2MB each)</small>
                                    @for ($i = 1; $i <= 5; $i++)
                                        <div class="mb-2">
                                            <label for="image{{ $i }}">Image {{ $i }}</label>
                                            <input type="file"
                                                class="form-control @error('image' . $i) is-invalid @enderror"
                                                id="image{{ $i }}" name="image{{ $i }}">
                                            @error('image' . $i)
                                                <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    @endfor
                                </div>

                            </div>

                            <div class="card-action">
                                <button type="submit" class="btn btn-primary">Save Portfolio</button>
                                <a href="{{ route('portfolio.index') }}" class="btn btn-danger">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
