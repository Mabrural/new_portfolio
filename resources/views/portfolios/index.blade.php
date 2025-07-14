@extends('layouts.main')

@section('container')
    <div class="container">
        <div class="page-inner">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
                <div>
                    <h3 class="fw-bold mb-3">Manage My Portfolio</h3>
                    <h6 class="text-muted mb-2">Showcase your best work to potential clients</h6>
                </div>
                <div class="ms-md-auto">
                    <a href="{{ route('portfolio.create') }}" class="btn btn-primary">+ Create Portfolio</a>
                </div>
            </div>

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

            @if ($portfolios->isEmpty())
                <div class="card border-0 shadow-sm">
                    <div class="card-body text-center py-5">
                        <img src="{{ asset('assets/img/empty-box.png') }}" alt="No projects" class="img-fluid mb-4"
                            style="max-height: 200px;">
                        <h4 class="fw-bold mb-3">No Portfolio Projects Yet</h4>
                        <p class="text-muted mb-4">Get started by adding your first project to showcase your work</p>
                    </div>
                </div>
            @else
                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4 g-4">
                    @foreach ($portfolios as $portfolio)
                        <div class="col">
                            <div class="card h-100 border-0 shadow-sm portfolio-card">
                                @php
                                    $firstImage = $portfolio->image1 ?? asset('assets/img/no-image.jpg');
                                @endphp

                                <div class="portfolio-image-container">
                                    @if (str_starts_with($firstImage, 'http'))
                                        <img src="{{ $firstImage }}" class="card-img-top" alt="{{ $portfolio->title }}">
                                    @else
                                        <img src="{{ asset('storage/' . $firstImage) }}" class="card-img-top"
                                            alt="{{ $portfolio->title }}">
                                    @endif
                                    <div class="portfolio-overlay">
                                        <button class="btn btn-sm btn-light view-details-btn" data-bs-toggle="offcanvas"
                                            data-bs-target="#portfolioDetails{{ $portfolio->id }}"
                                            aria-controls="portfolioDetails{{ $portfolio->id }}">
                                            <i class="fas fa-expand me-1"></i> Quick View
                                        </button>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-start mb-2">
                                        <h5 class="card-title mb-0">{{ Str::limit($portfolio->title, 28) }}</h5>
                                        <span class="badge bg-primary-light text-primary rounded-pill">
                                            {{ count(array_filter([$portfolio->image1, $portfolio->image2, $portfolio->image3, $portfolio->image4, $portfolio->image5])) }}
                                            images
                                        </span>
                                    </div>

                                    @if ($portfolio->technologies)
                                        <div class="mb-3">
                                            @foreach (explode(',', $portfolio->technologies) as $tech)
                                                <span
                                                    class="badge bg-light text-dark border me-1 mb-1">{{ trim($tech) }}</span>
                                            @endforeach
                                        </div>
                                    @endif

                                    <p class="card-text text-muted small mb-3">
                                        {{ Str::limit($portfolio->description, 100) }}
                                    </p>

                                    @if ($portfolio->link)
                                        <a href="{{ $portfolio->link }}" target="_blank"
                                            class="d-block text-truncate small mb-3">
                                            <i class="fas fa-external-link-alt me-1"></i>
                                            {{ parse_url($portfolio->link, PHP_URL_HOST) }}
                                        </a>
                                    @endif
                                </div>

                                <div class="card-footer bg-transparent border-0 pt-0 pb-3 px-3">
                                    <div
                                        class="d-flex flex-column flex-md-row justify-content-between align-items-start gap-2">
                                        <button class="btn btn-sm btn-outline-primary w-100 w-md-auto"
                                            data-bs-toggle="offcanvas"
                                            data-bs-target="#portfolioDetails{{ $portfolio->id }}"
                                            aria-controls="portfolioDetails{{ $portfolio->id }}">
                                            <i class="fas fa-eye me-1"></i> View Details
                                        </button>

                                        <div class="dropdown w-100 w-md-auto">
                                            <button class="btn btn-sm btn-outline-secondary w-100 w-md-auto" type="button"
                                                data-bs-toggle="dropdown">
                                                <i class="fas fa-ellipsis-h me-1"></i> More
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end w-100">
                                                <li>
                                                    <a class="dropdown-item"
                                                        href="{{ route('portfolio.edit', $portfolio) }}">
                                                        <i class="fas fa-edit text-warning me-2"></i> Edit
                                                    </a>
                                                </li>
                                                <li>
                                                    <form action="{{ route('portfolio.destroy', $portfolio) }}"
                                                        method="POST" id="deleteForm{{ $portfolio->id }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <a class="dropdown-item text-danger" href="#"
                                                            onclick="event.preventDefault(); 
                            Swal.fire({
                                title: 'Delete Project?',
                                text: 'Are you sure you want to delete this portfolio project?',
                                icon: 'warning',
                                showCancelButton: true,
                                confirmButtonColor: '#d33',
                                confirmButtonText: 'Yes, delete it!'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    document.getElementById('deleteForm{{ $portfolio->id }}').submit();
                                }
                            });">
                                                            <i class="fas fa-trash-alt me-2"></i> Delete
                                                        </a>
                                                    </form>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <!-- Offcanvas Details -->
                        <div class="offcanvas offcanvas-end" tabindex="-1" id="portfolioDetails{{ $portfolio->id }}"
                            aria-labelledby="portfolioDetailsLabel{{ $portfolio->id }}">
                            <div class="offcanvas-header border-bottom">
                                <h5 class="offcanvas-title fw-bold" id="portfolioDetailsLabel{{ $portfolio->id }}">
                                    {{ $portfolio->title }}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                                    aria-label="Close"></button>
                            </div>
                            <div class="offcanvas-body">
                                <div class="mb-4">
                                    @if ($portfolio->technologies)
                                        <div class="d-flex flex-wrap gap-2 mb-3">
                                            @foreach (explode(',', $portfolio->technologies) as $tech)
                                                <span class="badge bg-primary-light text-primary rounded-pill px-3 py-2">
                                                    {{ trim($tech) }}
                                                </span>
                                            @endforeach
                                        </div>
                                    @endif

                                    @if ($portfolio->description)
                                        <div class="mb-4">
                                            <h6 class="fw-bold mb-2">Project Description</h6>
                                            <p class="text-muted">{{ $portfolio->description }}</p>
                                        </div>
                                    @endif

                                    @if ($portfolio->link)
                                        <div class="mb-4">
                                            <h6 class="fw-bold mb-2">Project Link</h6>
                                            <a href="{{ $portfolio->link }}" target="_blank"
                                                class="d-inline-flex align-items-center text-primary">
                                                <i class="fas fa-external-link-alt me-2"></i> {{ $portfolio->link }}
                                            </a>
                                        </div>
                                    @endif
                                </div>

                                <!-- Image Gallery -->
                                <div class="mb-4">
                                    <h6 class="fw-bold mb-3">Project Gallery</h6>
                                    <div class="row g-3">
                                        @foreach (['image1', 'image2', 'image3', 'image4', 'image5'] as $imgCol)
                                            @if ($portfolio->$imgCol)
                                                <div class="col-12">
                                                    <img src="{{ asset('storage/' . $portfolio->$imgCol) }}"
                                                        class="img-fluid rounded-3 shadow-sm border" alt="Project Image"
                                                        style="cursor: pointer"
                                                        onclick="openImageModal('{{ asset('storage/' . $portfolio->$imgCol) }}')">
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="offcanvas-footer border-top p-3">
                                <div class="d-flex justify-content-between">
                                    <a href="{{ route('portfolio.edit', $portfolio) }}" class="btn btn-outline-primary">
                                        <i class="fas fa-edit me-2"></i> Edit Project
                                    </a>
                                    <button class="btn btn-primary" data-bs-dismiss="offcanvas">
                                        <i class="fas fa-check me-2"></i> Done
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
        <!-- Image Modal -->
        <div class="modal fade" id="imageModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content border-0">
                    <div class="modal-body p-0">
                        <img src="" id="modalImage" class="img-fluid w-100" alt="Project Image">
                    </div>
                    <div class="modal-footer justify-content-center border-0">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                            <i class="fas fa-times me-2"></i> Close
                        </button>
                        <a href="#" id="downloadImage" class="btn btn-primary" download>
                            <i class="fas fa-download me-2"></i> Download
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <style>
        .portfolio-card {
            transition: all 0.3s ease;
            border-radius: 12px;
            overflow: hidden;
        }

        .portfolio-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        .portfolio-image-container {
            position: relative;
            height: 200px;
            overflow: hidden;
        }

        .portfolio-image-container img {
            height: 100%;
            width: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .portfolio-card:hover .portfolio-image-container img {
            transform: scale(1.05);
        }

        .portfolio-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.3);
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .portfolio-card:hover .portfolio-overlay {
            opacity: 1;
        }

        .view-details-btn {
            transition: all 0.3s ease;
        }

        .bg-primary-light {
            background-color: rgba(108, 99, 255, 0.1);
        }

        .offcanvas {
            top: 0 !important;
            height: 100vh !important;
            max-height: 100vh;
            border-top: none;
            padding-top: 0 !important;
            margin-top: 0 !important;
        }


        .offcanvas-footer {
            background-color: #f8f9fa;
        }

        @media (max-width: 768px) {
            .offcanvas {
                width: 85vw;
            }
        }

        body,
        html {
            margin: 0;
            padding: 0;
        }
    </style>

    <script>
        function openImageModal(src) {
            const modal = new bootstrap.Modal(document.getElementById('imageModal'));
            document.getElementById('modalImage').src = src;
            document.getElementById('downloadImage').href = src;
            modal.show();
        }

        // Initialize tooltips
        document.addEventListener('DOMContentLoaded', function() {
            const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
            tooltipTriggerList.map(function(tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl);
            });
        });
    </script>
@endsection
