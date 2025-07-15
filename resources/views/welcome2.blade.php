<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $hero->name }} | {{ $hero->subname }}</title>
    <link rel="icon" href="{{  asset('assets/img/user-286.png')  }}" type="image/x-icon" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Space+Grotesk:wght@500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #2563eb;
            --primary-light: #3b82f6;
            --primary-dark: #1d4ed8;
            --dark: #0f172a;
            --darker: #020617;
            --light: #f8fafc;
            --gray: #e2e8f0;
            --dark-gray: #64748b;
        }

        body {
            font-family: 'Inter', sans-serif;
            color: var(--dark);
            line-height: 1.6;
            background-color: #f1f5f9;
            overflow-x: hidden;
        }

        h1, h2, h3, h4, h5, .display-1, .display-2, .display-3, .display-4 {
            font-family: 'Space Grotesk', sans-serif;
            font-weight: 600;
        }

        /* Glassmorphism effect */
        .glass-card {
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border-radius: 16px;
            border: 1px solid rgba(255, 255, 255, 0.2);
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
        }

        /* Hero Section */
        .hero {
            background: linear-gradient(135deg, var(--darker), var(--dark));
            color: white;
            padding: 100px 0 60px;
            position: relative;
            overflow: hidden;
            min-height: 100vh;
            display: flex;
            align-items: center;
        }

        .hero-bg-pattern {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: 
                radial-gradient(circle at 25% 25%, rgba(37, 99, 235, 0.2) 0%, transparent 50%),
                radial-gradient(circle at 75% 75%, rgba(37, 99, 235, 0.2) 0%, transparent 50%);
            opacity: 0.5;
        }

        .hero-content {
            position: relative;
            z-index: 2;
        }

        .hero-title {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
            background: linear-gradient(to right, #fff, #e0e7ff);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            line-height: 1.2;
        }

        .hero-subtitle {
            font-size: 1.25rem;
            color: #e2e8f0;
            margin-bottom: 1.5rem;
        }

        .hero-description {
            font-size: 1rem;
            color: #cbd5e1;
            max-width: 100%;
            margin-bottom: 2rem;
        }

        .hero-image {
            border-radius: 16px;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
            transform: perspective(1000px) rotateY(-5deg);
            transition: transform 0.5s ease;
            border: 1px solid rgba(255, 255, 255, 0.1);
            max-width: 100%;
            height: auto;
            margin-top: 2rem;
        }

        .hero-image:hover {
            transform: perspective(1000px) rotateY(0deg);
        }

        /* Button Styles */
        .btn-primary {
            background-color: var(--primary);
            border-color: var(--primary);
            font-weight: 500;
            padding: 0.75rem 1.5rem;
            border-radius: 12px;
            transition: all 0.3s ease;
            letter-spacing: 0.5px;
            font-size: 0.9rem;
        }

        .btn-primary:hover {
            background-color: var(--primary-dark);
            border-color: var(--primary-dark);
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(37, 99, 235, 0.3);
        }

        .btn-outline-light {
            border-radius: 12px;
            padding: 0.75rem 1.5rem;
            transition: all 0.3s ease;
            letter-spacing: 0.5px;
            font-size: 0.9rem;
        }

        .btn-outline-light:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(255, 255, 255, 0.1);
        }

        /* Section Styles */
        .section {
            padding: 4rem 0;
        }

        .section-title {
            position: relative;
            display: inline-block;
            margin-bottom: 2rem;
            font-weight: 700;
            color: var(--dark);
            font-size: 1.8rem;
        }

        .section-title:after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 50px;
            height: 4px;
            background: var(--primary);
            border-radius: 2px;
        }

        .section-subtitle {
            color: var(--dark-gray);
            margin-bottom: 2rem;
            font-size: 1rem;
            max-width: 700px;
            margin-left: auto;
            margin-right: auto;
        }

        /* Skill Cards */
        .skill-card {
            background: white;
            border-radius: 12px;
            padding: 1.5rem;
            text-align: center;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
            border: 1px solid rgba(0, 0, 0, 0.05);
            height: 100%;
            position: relative;
            overflow: hidden;
            margin-bottom: 1rem;
        }

        .skill-card:before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 5px;
            background: var(--primary);
        }

        .skill-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 20px rgba(37, 99, 235, 0.1);
        }

        .skill-icon {
            font-size: 2rem;
            color: var(--primary);
            margin-bottom: 1rem;
            background: rgba(37, 99, 235, 0.1);
            width: 60px;
            height: 60px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
        }

        /* Project Cards */
        .project-card {
            border: none;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
            height: 100%;
            background: white;
            margin-bottom: 1.5rem;
        }

        .project-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 20px rgba(37, 99, 235, 0.1);
        }

        .project-image {
            height: 180px;
            object-fit: cover;
            width: 100%;
            transition: transform 0.5s ease;
        }

        .project-card:hover .project-image {
            transform: scale(1.05);
        }

        .project-title {
            font-weight: 600;
            margin-bottom: 0.5rem;
            font-size: 1.1rem;
        }

        .project-description {
            color: var(--dark-gray);
            margin-bottom: 1rem;
            font-size: 0.9rem;
        }

        /* Contact Section */
        .contact-card {
            background: white;
            border-radius: 16px;
            padding: 2rem;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.05);
            width: 100%;
        }

        .contact-item {
            display: flex;
            align-items: center;
            margin-bottom: 1rem;
            padding: 0.75rem;
            border-radius: 12px;
            transition: all 0.3s ease;
        }

        .contact-item:hover {
            background: rgba(37, 99, 235, 0.05);
        }

        .contact-icon {
            font-size: 1.25rem;
            color: var(--primary);
            margin-right: 1rem;
            width: 40px;
            height: 40px;
            background: rgba(37, 99, 235, 0.1);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .contact-label {
            font-weight: 500;
            margin-bottom: 0.25rem;
            font-size: 0.9rem;
        }

        .contact-value {
            color: var(--dark-gray);
            font-size: 0.85rem;
            word-break: break-all;
        }

        .contact-value a {
            color: var(--dark-gray);
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .contact-value a:hover {
            color: var(--primary);
        }

        /* Footer */
        .footer {
            background: var(--dark);
            color: white;
            padding: 2rem 0;
        }

        .footer-text {
            color: #94a3b8;
            font-size: 0.9rem;
        }

        /* Auth Button */
        .auth-btn-container {
            position: fixed;
            top: 15px;
            right: 15px;
            z-index: 1000;
        }

        .auth-btn {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            color: white;
            border-radius: 12px;
            padding: 0.5rem 1rem;
            font-size: 0.8rem;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            text-decoration: none;
        }

        .auth-btn:hover {
            background: rgba(255, 255, 255, 0.2);
            transform: translateY(-2px);
        }

        .user-avatar {
            width: 24px;
            height: 24px;
            border-radius: 50%;
            background: var(--primary);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.7rem;
            font-weight: 600;
        }

        /* Floating shapes */
        .floating-shape {
            position: absolute;
            border-radius: 50%;
            opacity: 0.1;
            z-index: 1;
            animation: float 6s ease-in-out infinite;
            display: none; /* Hidden on mobile by default */
        }

        .shape-1 {
            top: 20%;
            left: 10%;
            width: 120px;
            height: 120px;
            background: var(--primary);
            animation-delay: 0s;
        }

        .shape-2 {
            bottom: 10%;
            right: 10%;
            width: 100px;
            height: 100px;
            background: var(--primary);
            animation-delay: 2s;
        }

        .shape-3 {
            top: 60%;
            left: 20%;
            width: 80px;
            height: 80px;
            background: var(--primary);
            animation-delay: 4s;
        }

        @keyframes float {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-15px); }
            100% { transform: translateY(0px); }
        }

        /* Responsive adjustments */
        @media (min-width: 576px) {
            .hero-title {
                font-size: 2.8rem;
            }
            
            .hero-subtitle {
                font-size: 1.4rem;
            }
            
            .section-title {
                font-size: 2rem;
            }
            
            .floating-shape {
                display: block;
            }
        }

        @media (min-width: 768px) {
            .hero {
                padding: 120px 0 80px;
            }
            
            .hero-title {
                font-size: 3rem;
            }
            
            .hero-description {
                font-size: 1.1rem;
            }
            
            .section {
                padding: 5rem 0;
            }
            
            .section-title {
                font-size: 2.2rem;
                margin-bottom: 2.5rem;
            }
            
            .section-title:after {
                bottom: -12px;
                height: 5px;
            }
            
            .skill-icon {
                font-size: 2.2rem;
                width: 70px;
                height: 70px;
            }
            
            .project-image {
                height: 200px;
            }
            
            .contact-icon {
                font-size: 1.5rem;
                width: 50px;
                height: 50px;
            }
        }

        @media (min-width: 992px) {
            .hero {
                padding: 140px 0 100px;
            }
            
            .hero-title {
                font-size: 3.5rem;
            }
            
            .hero-subtitle {
                font-size: 1.5rem;
            }
            
            .hero-description {
                font-size: 1.15rem;
            }
            
            .hero-image {
                margin-top: 0;
            }
            
            .section {
                padding: 6rem 0;
            }
            
            .shape-1 {
                width: 200px;
                height: 200px;
            }
            
            .shape-2 {
                width: 150px;
                height: 150px;
            }
            
            .shape-3 {
                width: 100px;
                height: 100px;
            }
        }

        @media (min-width: 1200px) {
            .hero-title {
                font-size: 4rem;
            }
        }

        /* Mobile menu toggle for dropdown */
        .dropdown-menu {
            border: none;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
            border-radius: 12px;
            padding: 0.5rem;
        }
        
        .dropdown-item {
            border-radius: 8px;
            padding: 0.5rem 1rem;
            margin: 0.25rem 0;
            font-size: 0.9rem;
        }
        
        .dropdown-item:hover {
            background-color: rgba(37, 99, 235, 0.1);
        }
    </style>
</head>

<body>
    <!-- Auth Button -->
    <div class="auth-btn-container">
        @auth
            <div class="dropdown">
                <button class="auth-btn dropdown-toggle" type="button" id="userDropdown" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    <div class="user-avatar">
                        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                    </div>
                    <span class="d-none d-sm-inline">{{ Auth::user()->name }}</span>
                </button>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                    <li><a class="dropdown-item" href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li><a class="dropdown-item" href="{{ route('profile.edit') }}">Profile</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="dropdown-item">Logout</button>
                        </form>
                    </li>
                </ul>
            </div>
        @else
            <a href="{{ route('login') }}" class="auth-btn">
                <i class="fas fa-sign-in-alt"></i> <span class="d-none d-sm-inline">Masuk</span>
            </a>
        @endauth
    </div>

    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-bg-pattern"></div>
        <div class="floating-shape shape-1"></div>
        <div class="floating-shape shape-2"></div>
        <div class="floating-shape shape-3"></div>
        
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 order-lg-1 order-2">
                    <div class="hero-content text-center text-lg-start">
                        <h1 class="hero-title">{{ $hero->name }}</h1>
                        <h2 class="hero-subtitle">{{ $hero->subname }}</h2>
                        <p class="hero-description">{{ $hero->description }}</p>
                        <div class="d-flex flex-wrap gap-3 hero-buttons justify-content-center justify-content-lg-start">
                            <a href="#contact" class="btn btn-primary">
                                <i class="fas fa-paper-plane me-1 me-sm-2"></i> Hubungi Saya
                            </a>
                            <a href="#portfolio" class="btn btn-outline-light">
                                <i class="fas fa-eye me-1 me-sm-2"></i> Portofolio
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 order-lg-2 order-1 mb-4 mb-lg-0">
                    <div class="text-center">
                        <img src="{{ asset('storage/' . $hero->image) }}" alt="{{ $hero->name }}" class="img-fluid hero-image">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Skills Section -->
    <section class="section bg-white" id="skills">
        <div class="container">
            <div class="text-center">
                <h2 class="section-title">Keahlian Teknis</h2>
                <p class="section-subtitle">Teknologi dan alat yang saya kuasai</p>
            </div>

            <div class="row g-3">
                @foreach ($skills as $skill)
                    <div class="col-6 col-md-4 col-lg-3">
                        <div class="skill-card">
                            <div class="skill-icon">
                                <i class="{{ $skill->icon }}"></i>
                            </div>
                            <h4 class="mt-2 mb-1" style="font-size: 1.1rem;">{{ $skill->name }}</h4>
                            <p class="text-muted mb-0" style="font-size: 0.85rem;">{{ $skill->subname }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Portfolio Section -->
    <section class="section bg-light" id="portfolio">
        <div class="container">
            <div class="text-center">
                <h2 class="section-title">Portofolio</h2>
                <p class="section-subtitle">Beberapa proyek terbaru yang telah saya kerjakan</p>
            </div>

            <div class="row g-3">
                @foreach ($portfolios as $portfolio)
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="project-card">
                            <img src="{{ asset('storage/' . $portfolio->image1) }}" class="project-image w-100" alt="{{ $portfolio->title }}">
                            <div class="p-3">
                                <h5 class="project-title">{{ $portfolio->title }}</h5>
                                <p class="project-description">{{ Str::limit($portfolio->description, 100) }}</p>
                                <a href="#" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal"
                                    data-bs-target="#portfolioModal{{ $portfolio->id }}">Lihat Detail</a>
                            </div>
                        </div>
                    </div>

                    <!-- Portfolio Modal -->
                    <div class="modal fade" id="portfolioModal{{ $portfolio->id }}" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">{{ $portfolio->title }}</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p class="mb-4">{{ $portfolio->description }}</p>

                                    <div class="row g-2">
                                        @for ($i = 1; $i <= 5; $i++)
                                            @php
                                                $imageField = 'image' . $i;
                                            @endphp
                                            @if ($portfolio->$imageField)
                                                <div class="col-12 col-md-6">
                                                    <img src="{{ asset('storage/' . $portfolio->$imageField) }}"
                                                        class="img-fluid rounded shadow-sm"
                                                        alt="{{ $portfolio->title }} image {{ $i }}">
                                                </div>
                                            @endif
                                        @endfor
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="section bg-white" id="contact">
        <div class="container">
            <div class="text-center">
                <h2 class="section-title">Hubungi Saya</h2>
                <p class="section-subtitle">Saya terbuka untuk peluang baru dan proyek kolaborasi</p>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="contact-card">
                        <div class="row">
                            @php
                                $contacts = [
                                    [
                                        'icon' => 'fas fa-envelope',
                                        'label' => 'Email',
                                        'value' => $contact->email ?? '-',
                                        'href' => $contact->email ? 'mailto:' . $contact->email : null,
                                    ],
                                    [
                                        'icon' => 'fab fa-whatsapp',
                                        'label' => 'WhatsApp',
                                        'value' => $contact->whatsapp ? '+' . $contact->whatsapp : '-',
                                        'href' => $contact->whatsapp ? 'https://wa.me/' . $contact->whatsapp : null,
                                    ],
                                    [
                                        'icon' => 'fab fa-linkedin',
                                        'label' => 'LinkedIn',
                                        'value' => $contact->linkedin ?? '-',
                                        'href' => $contact->linkedin,
                                    ],
                                    [
                                        'icon' => 'fab fa-instagram',
                                        'label' => 'Instagram',
                                        'value' => $contact->instagram ?? '-',
                                        'href' => $contact->instagram,
                                    ],
                                    [
                                        'icon' => 'fab fa-github',
                                        'label' => 'GitHub',
                                        'value' => $contact->github ?? '-',
                                        'href' => $contact->github,
                                    ],
                                    [
                                        'icon' => 'fab fa-facebook',
                                        'label' => 'Facebook',
                                        'value' => $contact->facebook ?? '-',
                                        'href' => $contact->facebook,
                                    ],
                                ];
                            @endphp

                            @foreach ($contacts as $c)
                                <div class="col-12 col-sm-6 mb-3">
                                    <div class="contact-item">
                                        <div class="contact-icon">
                                            <i class="{{ $c['icon'] }}"></i>
                                        </div>
                                        <div>
                                            <div class="contact-label">{{ $c['label'] }}</div>
                                            <div class="contact-value">
                                                @if ($c['href'])
                                                    <a href="{{ $c['href'] }}" target="_blank">
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
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container text-center">
            <p class="footer-text mb-0">&copy; 2025 {{ $hero->name }} - {{ $hero->subname }}. All rights reserved.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                
                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });

        // Initialize tooltips
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        });
    </script>
</body>

</html>