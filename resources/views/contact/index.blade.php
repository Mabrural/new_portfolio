@extends('layouts.main')

@section('container')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <div class="container">
        <div class="page-inner">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
                <div>
                    <h3 class="fw-bold mb-3">Manage Contact</h3>
                    <h6 class="text-muted mb-2">Your contact information visible to visitors on your landing page</h6>
                </div>
            </div>

            <div class="row">
                @if (session('success'))
                    <script>
                        Swal.fire({
                            toast: true,
                            position: 'top-end',
                            icon: 'success',
                            title: '{{ session('success') }}',
                            showConfirmButton: false,
                            timer: 2000
                        });
                    </script>
                @endif

                @if (session('info'))
                    <script>
                        Swal.fire({
                            toast: true,
                            position: 'top-end',
                            icon: 'info',
                            title: '{{ session('info') }}',
                            showConfirmButton: false,
                            timer: 2000
                        });
                    </script>
                @endif

                @if (!$contact)
                    <div class="text-center">
                        <p class="text-muted mb-3">No contact data yet.</p>
                        <a href="{{ route('contact.create') }}" class="btn btn-primary">+ Create Contact</a>
                    </div>
                @else
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <div class="row row-cols-1 row-cols-md-2 g-4">
                                <div class="col">
                                    <div class="d-flex align-items-center">
                                        <i class="fas fa-envelope fa-lg text-primary me-3"></i>
                                        <div>
                                            <div class="fw-semibold">Email</div>
                                            <div class="text-muted">{{ $contact->email ?? '' }}</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="d-flex align-items-center">
                                        <i class="fab fa-whatsapp fa-lg text-success me-3"></i>
                                        <div>
                                            <div class="fw-semibold">WhatsApp</div>
                                            <div class="text-muted">{{ $contact->whatsapp ?? '-' }}</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="d-flex align-items-center">
                                        <i class="fab fa-linkedin fa-lg text-primary me-3"></i>
                                        <div>
                                            <div class="fw-semibold">LinkedIn</div>
                                            <a href="{{ $contact->linkedin }}" target="_blank"
                                                class="text-muted text-decoration-none">
                                                {{ $contact->linkedin ?? '-' }}
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="d-flex align-items-center">
                                        <i class="fab fa-tiktok fa-lg text-dark me-3"></i>
                                        <div>
                                            <div class="fw-semibold">TikTok</div>
                                            <a href="{{ $contact->tiktok }}" target="_blank"
                                                class="text-muted text-decoration-none">
                                                {{ $contact->tiktok ?? '-' }}
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="d-flex align-items-center">
                                        <i class="fab fa-instagram fa-lg text-danger me-3"></i>
                                        <div>
                                            <div class="fw-semibold">Instagram</div>
                                            <a href="{{ $contact->instagram }}" target="_blank"
                                                class="text-muted text-decoration-none">
                                                {{ $contact->instagram ?? '-' }}
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="d-flex align-items-center">
                                        <i class="fab fa-facebook fa-lg text-primary me-3"></i>
                                        <div>
                                            <div class="fw-semibold">Facebook</div>
                                            <a href="{{ $contact->facebook }}" target="_blank"
                                                class="text-muted text-decoration-none">
                                                {{ $contact->facebook ?? '-' }}
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="d-flex align-items-center">
                                        <i class="fab fa-github fa-lg text-dark me-3"></i>
                                        <div>
                                            <div class="fw-semibold">GitHub</div>
                                            <a href="{{ $contact->github }}" target="_blank"
                                                class="text-muted text-decoration-none">
                                                {{ $contact->github ?? '-' }}
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="text-end mt-4">
                                <a href="{{ route('contact.edit', $contact) }}" class="btn btn-warning">
                                    <i class="fas fa-edit me-2"></i> Edit Contact
                                </a>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
