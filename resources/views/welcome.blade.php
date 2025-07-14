<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $hero->name }} | {{ $hero->subname }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <style>
        :root {
            --primary: #6c63ff;
            --primary-dark: #564fd8;
            --dark: #1a1a2e;
            --light: #f8f9fa;
            --gray: #e6e6e6;
        }

        body {
            font-family: 'Poppins', sans-serif;
            color: #333;
            line-height: 1.6;
        }

        .hero {
            background: linear-gradient(135deg, var(--dark), #16213e);
            color: white;
            padding: 120px 0 100px;
            position: relative;
            overflow: hidden;
        }

        .hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxMDAlIiBoZWlnaHQ9IjEwMCUiPjxkZWZzPjxwYXR0ZXJuIGlkPSJwYXR0ZXJuIiB3aWR0aD0iNDAiIGhlaWdodD0iNDAiIHBhdHRlcm5Vbml0cz0idXNlclNwYWNlT25Vc2UiIHBhdHRlcm5UcmFuc2Zvcm09InJvdGF0ZSg0NSkiPjxyZWN0IHdpZHRoPSIyMCIgaGVpZ2h0PSIyMCIgZmlsbD0icmdiYSgyNTUsMjU1LDI1NSwwLjAzKSIvPjwvcGF0dGVybj48L2RlZnM+PHJlY3Qgd2lkdGg9IjEwMCUiIGhlaWdodD0iMTAwJSIgZmlsbD0idXJsKCNwYXR0ZXJuKSIvPjwvc3ZnPg==');
            opacity: 0.5;
        }

        .hero-content {
            position: relative;
            z-index: 1;
        }

        .display-4 {
            font-weight: 700;
            margin-bottom: 20px;
            background: linear-gradient(to right, #fff, #ddd);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .btn-primary {
            background-color: var(--primary);
            border-color: var(--primary);
            font-weight: 500;
            padding: 10px 25px;
            border-radius: 50px;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background-color: var(--primary-dark);
            border-color: var(--primary-dark);
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(108, 99, 255, 0.3);
        }

        .section-title {
            position: relative;
            display: inline-block;
            margin-bottom: 40px;
            font-weight: 600;
        }

        .section-title::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 50px;
            height: 3px;
            background: var(--primary);
        }

        .skill-card {
            background: white;
            border-radius: 10px;
            padding: 30px 20px;
            text-align: center;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
            border: 1px solid rgba(0, 0, 0, 0.05);
            height: 100%;
        }

        .skill-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(108, 99, 255, 0.1);
        }

        .skill-icon {
            font-size: 2.5rem;
            color: var(--primary);
            margin-bottom: 15px;
        }

        .project {
            border: none;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
            height: 100%;
        }

        .project:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(108, 99, 255, 0.1);
        }

        .project img {
            height: 200px;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .project:hover img {
            transform: scale(1.05);
        }

        .card-body {
            padding: 25px;
        }

        .badge-tech {
            background-color: var(--primary);
            color: white;
            margin-right: 5px;
            margin-bottom: 5px;
            font-weight: 400;
        }

        .contact-card {
            background: white;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            max-width: 600px;
            margin: 0 auto;
        }

        .contact-icon {
            font-size: 1.5rem;
            color: var(--primary);
            margin-right: 10px;
        }

        .social-links a {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: var(--primary);
            color: white;
            margin: 0 5px;
            transition: all 0.3s ease;
        }

        .social-links a:hover {
            background: var(--primary-dark);
            transform: translateY(-3px);
        }

        footer {
            background: var(--dark);
            color: white;
            padding: 20px 0;
        }

        .nav-pills .nav-link.active {
            background-color: var(--primary);
        }

        .nav-pills .nav-link {
            color: var(--dark);
        }

        .floating-shape {
            position: absolute;
            opacity: 0.1;
            z-index: 0;
        }

        .shape-1 {
            top: 20%;
            left: 10%;
            width: 200px;
            height: 200px;
            background: var(--primary);
            border-radius: 30% 70% 70% 30% / 30% 30% 70% 70%;
        }

        .shape-2 {
            bottom: 10%;
            right: 10%;
            width: 150px;
            height: 150px;
            background: var(--primary);
            border-radius: 50% 50% 50% 50% / 60% 60% 40% 40%;
        }
    </style>
</head>

<body>
    <!-- Hero Section -->
    <section class="hero">
        <div class="floating-shape shape-1"></div>
        <div class="floating-shape shape-2"></div>
        <div class="container hero-content">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h1 class="display-4">{{ $hero->name }}</h1>
                    <h2 class="h3 mb-4">{{ $hero->subname }}</h2>
                    <p class="lead mb-4">{{ $hero->description }}</p>
                    <div class="d-flex flex-column flex-md-row gap-2">
                        <a href="#contact" class="btn btn-primary px-3 py-2">
                            <i class="fas fa-paper-plane me-2"></i> Hubungi Saya
                        </a>
                        <a href="#portfolio" class="btn btn-outline-light px-3 py-2">
                            <i class="fas fa-eye me-2"></i> Portofolio
                        </a>
                    </div>

                </div>
                <div class="col-lg-6 d-none d-lg-block">
                    <img src="{{ asset('storage/' . $hero->image) }}" alt="Laravel Developer"
                        class="img-fluid rounded-3 shadow">
                </div>
            </div>
        </div>
    </section>

    <!-- Skill Section -->
    <section class="py-5 bg-light">
        <div class="container py-5">
            <h2 class="text-center section-title">Keahlian Teknis</h2>

            <div class="row g-4 mt-4">
                @foreach ($skills as $skill)
                    <div class="col-md-3">
                        <div class="skill-card">
                            <div class="skill-icon">
                                <i class="{{ $skill->icon }}"></i>
                            </div>
                            <h4>{{ $skill->name }}</h4>
                            <p class="mb-0">{{ $skill->subname }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Portfolio Section --}}
    <section class="py-5" id="portfolio">
        <div class="container py-5">
            <h2 class="text-center section-title">Portofolio</h2>
            <p class="text-center mb-5">Beberapa proyek terbaru yang telah saya kerjakan</p>

            <div class="row g-4">
                @foreach ($portfolios as $portfolio)
                    <div class="col-md-4">
                        <div class="card project">
                            <img src="{{ asset('storage/' . $portfolio->image1) }}" class="card-img-top"
                                alt="{{ $portfolio->title }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $portfolio->title }}</h5>
                                <p class="card-text">{{ Str::limit($portfolio->description, 100) }}</p>
                                <a href="#" class="btn btn-outline-primary btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#portfolioModal{{ $portfolio->id }}">Lihat Detail</a>
                            </div>
                        </div>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="portfolioModal{{ $portfolio->id }}" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">{{ $portfolio->title }}</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p>{{ $portfolio->description }}</p>

                                    <div class="row">
                                        @for ($i = 1; $i <= 5; $i++)
                                            @php
                                                $imageField = 'image' . $i;
                                            @endphp
                                            @if ($portfolio->$imageField)
                                                <div class="col-md-6 mb-3">
                                                    <img src="{{ asset('storage/' . $portfolio->$imageField) }}"
                                                        class="img-fluid rounded"
                                                        alt="{{ $portfolio->title }} image {{ $i }}">
                                                </div>
                                            @endif
                                        @endfor
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Tutup</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>


    <section class="py-5 bg-light" id="contact">
        <div class="container py-5">
            <h2 class="text-center section-title">Hubungi Saya</h2>
            <p class="text-center mb-5">Saya terbuka untuk peluang baru dan proyek kolaborasi</p>

            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                                @php
                                    $contacts = [
                                        [
                                            'icon' => 'fas fa-envelope',
                                            'color' => 'text-primary',
                                            'label' => 'Email',
                                            'value' => $contact->email ?? '-',
                                            'href' => $contact->email ? 'mailto:' . $contact->email : null,
                                        ],
                                        [
                                            'icon' => 'fab fa-whatsapp',
                                            'color' => 'text-success',
                                            'label' => 'WhatsApp',
                                            'value' => $contact->whatsapp ? '+' . $contact->whatsapp : '-',
                                            'href' => $contact->whatsapp ? 'https://wa.me/' . $contact->whatsapp : null,
                                        ],
                                        [
                                            'icon' => 'fab fa-linkedin',
                                            'color' => 'text-primary',
                                            'label' => 'LinkedIn',
                                            'value' => $contact->linkedin ?? '-',
                                            'href' => $contact->linkedin,
                                        ],
                                        [
                                            'icon' => 'fab fa-instagram',
                                            'color' => 'text-danger',
                                            'label' => 'Instagram',
                                            'value' => $contact->instagram ?? '-',
                                            'href' => $contact->instagram,
                                        ],
                                        [
                                            'icon' => 'fab fa-github',
                                            'color' => 'text-dark',
                                            'label' => 'GitHub',
                                            'value' => $contact->github ?? '-',
                                            'href' => $contact->github,
                                        ],
                                        [
                                            'icon' => 'fab fa-facebook',
                                            'color' => 'text-info',
                                            'label' => 'Facebook',
                                            'value' => $contact->facebook ?? '-',
                                            'href' => $contact->facebook,
                                        ],
                                    ];
                                @endphp

                                @foreach ($contacts as $c)
                                    <div class="col">
                                        <div class="d-flex align-items-center gap-3">
                                            <i class="{{ $c['icon'] }} fa-lg {{ $c['color'] }}"></i>
                                            <div class="flex-grow-1">
                                                <div class="fw-semibold">{{ $c['label'] }}</div>
                                                <div class="text-muted text-wrap text-break">
                                                    @if ($c['href'])
                                                        <a href="{{ $c['href'] }}" target="_blank"
                                                            class="text-decoration-none">
                                                            {{ $c['value'] }}
                                                        </a>
                                                    @else
                                                        {{ $c['value'] }}
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>




    <footer class="text-center py-4">
        <div class="container">
            <p class="mb-0">&copy; 2025 {{ $hero->name }} - {{ $hero->subname }}. <br>All rights reserved.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
