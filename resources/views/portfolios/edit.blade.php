@extends('layouts.main')

@section('container')
    <style>
        .preview-image {
            width: 150px;
            height: 150px;
            object-fit: cover;
            border-radius: 0.5rem;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
        }
    </style>

    <div class="container">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Edit Portfolio</h4>
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
                        <a href="#">Edit Portfolio</a>
                    </li>
                </ul>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Portfolio Information</div>
                        </div>
                        <form action="{{ route('portfolio.update', $portfolio) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="title">Title <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control @error('title') is-invalid @enderror"
                                                id="title" name="title" value="{{ old('title', $portfolio->title) }}"
                                                required>
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
                                                id="technologies" name="technologies"
                                                value="{{ old('technologies', $portfolio->technologies) }}">
                                            @error('technologies')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description"
                                        rows="4">{{ old('description', $portfolio->description) }}</textarea>
                                    @error('description')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="link">Link</label>
                                    <input type="url" class="form-control @error('link') is-invalid @enderror"
                                        id="link" name="link" value="{{ old('link', $portfolio->link) }}">
                                    @error('link')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>


                                <div class="form-group">
                                    <label>Portfolio Images</label>
                                    <small class="form-text text-muted mb-2">
                                        Leave empty to keep existing images. Upload a new image to replace the current one.
                                    </small>

                                    @for ($i = 1; $i <= 5; $i++)
                                        <div class="mb-3">
                                            <label for="image{{ $i }}">Image {{ $i }}</label>
                                            @php
                                                $currentImage = $portfolio->{'image' . $i};
                                            @endphp
                                            @if ($currentImage)
                                                <div class="mb-2">
                                                    <img src="{{ asset('storage/' . $currentImage) }}"
                                                        alt="Image {{ $i }}" class="preview-image">
                                                </div>
                                            @endif
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
                                <button type="submit" class="btn btn-primary">Update Portfolio</button>
                                <a href="{{ route('portfolio.index') }}" class="btn btn-danger">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
