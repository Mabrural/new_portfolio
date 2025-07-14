@extends('layouts.main')

@section('container')
    <div class="container">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Edit Contact</h4>
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
                        <a href="{{ route('contact.index') }}">Contact</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Edit Contact</a>
                    </li>
                </ul>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Contact Information</div>
                        </div>
                        <form action="{{ route('contact.update', $contact) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="email">Email <span class="text-danger">*</span></label>
                                    <input type="email" 
                                        class="form-control @error('email') is-invalid @enderror" 
                                        id="email" name="email" 
                                        value="{{ old('email', $contact->email) }}" required>
                                    @error('email')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="whatsapp">WhatsApp</label>
                                            <input type="text" 
                                                class="form-control @error('whatsapp') is-invalid @enderror" 
                                                id="whatsapp" name="whatsapp" 
                                                value="{{ old('whatsapp', $contact->whatsapp) }}">
                                            @error('whatsapp')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="linkedin">LinkedIn</label>
                                            <input type="text" 
                                                class="form-control @error('linkedin') is-invalid @enderror" 
                                                id="linkedin" name="linkedin" 
                                                value="{{ old('linkedin', $contact->linkedin) }}">
                                            @error('linkedin')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="tiktok">TikTok</label>
                                            <input type="text" 
                                                class="form-control @error('tiktok') is-invalid @enderror" 
                                                id="tiktok" name="tiktok" 
                                                value="{{ old('tiktok', $contact->tiktok) }}">
                                            @error('tiktok')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="instagram">Instagram</label>
                                            <input type="text" 
                                                class="form-control @error('instagram') is-invalid @enderror" 
                                                id="instagram" name="instagram" 
                                                value="{{ old('instagram', $contact->instagram) }}">
                                            @error('instagram')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="facebook">Facebook</label>
                                            <input type="text" 
                                                class="form-control @error('facebook') is-invalid @enderror" 
                                                id="facebook" name="facebook" 
                                                value="{{ old('facebook', $contact->facebook) }}">
                                            @error('facebook')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="github">GitHub</label>
                                            <input type="text" 
                                                class="form-control @error('github') is-invalid @enderror" 
                                                id="github" name="github" 
                                                value="{{ old('github', $contact->github) }}">
                                            @error('github')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card-action">
                                <button type="submit" class="btn btn-primary">Update Contact</button>
                                <a href="{{ route('contact.index') }}" class="btn btn-danger">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
