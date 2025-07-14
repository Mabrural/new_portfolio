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
                    <div class="d-flex gap-3">
                        <a href="#contact" class="btn btn-primary btn-lg">
                            <i class="fas fa-paper-plane me-2"></i> Hubungi Saya
                        </a>
                        <a href="#portfolio" class="btn btn-outline-light btn-lg">
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
                <div class="col-md-3">
                    <div class="skill-card">
                        <div class="skill-icon">
                            <i class="fab fa-laravel"></i>
                        </div>
                        <h4>Laravel Expert</h4>
                        <p class="mb-0">Pengembangan aplikasi kompleks dengan framework PHP modern</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="skill-card">
                        <div class="skill-icon">
                            <i class="fas fa-database"></i>
                        </div>
                        <h4>Database Design</h4>
                        <p class="mb-0">Struktur database optimal dengan MySQL, PostgreSQL</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="skill-card">
                        <div class="skill-icon">
                            <i class="fas fa-server"></i>
                        </div>
                        <h4>API Development</h4>
                        <p class="mb-0">RESTful API dengan autentikasi JWT & Sanctum</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="skill-card">
                        <div class="skill-icon">
                            <i class="fas fa-file-export"></i>
                        </div>
                        <h4>Laporan & Export</h4>
                        <p class="mb-0">Generasi PDF, Excel, CSV dengan Laravel Excel</p>
                    </div>
                </div>
            </div>

            <div class="row g-4 mt-2">
                <div class="col-md-3">
                    <div class="skill-card">
                        <div class="skill-icon">
                            <i class="fab fa-html5"></i>
                        </div>
                        <h4>Frontend</h4>
                        <p class="mb-0">HTML5, CSS3, JavaScript, Bootstrap</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="skill-card">
                        <div class="skill-icon">
                            <i class="fas fa-mobile-alt"></i>
                        </div>
                        <h4>Responsive Design</h4>
                        <p class="mb-0">Website yang optimal di semua perangkat</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="skill-card">
                        <div class="skill-icon">
                            <i class="fas fa-shield-alt"></i>
                        </div>
                        <h4>Keamanan</h4>
                        <p class="mb-0">Proteksi terhadap SQLi, XSS, CSRF, dll</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="skill-card">
                        <div class="skill-icon">
                            <i class="fas fa-rocket"></i>
                        </div>
                        <h4>Optimasi</h4>
                        <p class="mb-0">Caching, eager loading, query optimization</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Portfolio Section -->
    <section class="py-5" id="portfolio">
        <div class="container py-5">
            <h2 class="text-center section-title">Portofolio</h2>
            <p class="text-center mb-5">Beberapa proyek terbaru yang telah saya kerjakan</p>

            <ul class="nav nav-pills justify-content-center mb-4" id="portfolio-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="all-tab" data-bs-toggle="pill" data-bs-target="#all"
                        type="button" role="tab">Semua</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="ecommerce-tab" data-bs-toggle="pill" data-bs-target="#ecommerce"
                        type="button" role="tab">E-Commerce</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="crm-tab" data-bs-toggle="pill" data-bs-target="#crm"
                        type="button" role="tab">CRM</button>
                </li>
            </ul>

            <div class="tab-content" id="portfolio-tabContent">
                <div class="tab-pane fade show active" id="all" role="tabpanel">
                    <div class="row g-4">
                        <div class="col-md-4">
                            <div class="card project">
                                <img src="{{ asset('assets/img/laravel_banner011.png') }}" class="card-img-top"
                                    alt="Sistem Inventory">
                                <div class="card-body">
                                    <h5 class="card-title">Sistem Manajemen Inventory</h5>
                                    <p class="card-text">Aplikasi inventory dengan multi-gudang, notifikasi stok
                                        minimum, dan laporan bulanan.</p>
                                    <div class="mb-3">
                                        <span class="badge badge-tech">Laravel</span>
                                        <span class="badge badge-tech">Livewire</span>
                                        <span class="badge badge-tech">MySQL</span>
                                    </div>
                                    <a href="#" class="btn btn-outline-primary btn-sm">Lihat Detail</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card project">
                                <img src="{{ asset('assets/img/laravel_banner011.png') }}" class="card-img-top"
                                    alt="HR System">
                                <div class="card-body">
                                    <h5 class="card-title">Sistem HR & Payroll</h5>
                                    <p class="card-text">Manajemen karyawan, absensi, penggajian dengan slip gaji
                                        otomatis.</p>
                                    <div class="mb-3">
                                        <span class="badge badge-tech">Laravel</span>
                                        <span class="badge badge-tech">Bootstrap</span>
                                        <span class="badge badge-tech">JQuery</span>
                                    </div>
                                    <a href="#" class="btn btn-outline-primary btn-sm">Lihat Detail</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card project">
                                <img src="{{ asset('assets/img/laravel_banner011.png') }}" class="card-img-top"
                                    alt="POS System">
                                <div class="card-body">
                                    <h5 class="card-title">Aplikasi Kasir Modern</h5>
                                    <p class="card-text">Sistem point-of-sale dengan inventori, laporan keuangan, dan
                                        ekspor PDF/Excel.</p>
                                    <div class="mb-3">
                                        <span class="badge badge-tech">Laravel</span>
                                        <span class="badge badge-tech">Livewire</span>
                                        <span class="badge badge-tech">Bootstrap</span>
                                    </div>
                                    <a href="#" class="btn btn-outline-primary btn-sm">Lihat Detail</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="ecommerce" role="tabpanel">
                    <!-- Ecommerce projects would go here -->
                </div>
                <div class="tab-pane fade" id="crm" role="tabpanel">
                    <!-- CRM projects would go here -->
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="py-5 bg-light" id="contact">
        <div class="container py-5">
            <h2 class="text-center section-title">Hubungi Saya</h2>
            <p class="text-center mb-5">Saya terbuka untuk peluang baru dan proyek kolaborasi</p>

            <div class="contact-card">
                <div class="row">
                    <div class="col-md-6 mb-4">
                        <div class="d-flex align-items-center mb-3">
                            <div class="contact-icon">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <div>
                                <h5 class="mb-0">Email</h5>
                                <a href="mailto:kamu@email.com" class="text-decoration-none">kamu@email.com</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="d-flex align-items-center mb-3">
                            <div class="contact-icon">
                                <i class="fab fa-whatsapp"></i>
                            </div>
                            <div>
                                <h5 class="mb-0">WhatsApp</h5>
                                <a href="https://wa.me/628123456789" class="text-decoration-none">+62 812-3456-789</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="text-center mt-4">
                    <h5 class="mb-3">Atau temui saya di</h5>
                    <div class="social-links d-flex justify-content-center">
                        <a href="#"><i class="fab fa-github"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="text-center py-4">
        <div class="container">
            <p class="mb-0">&copy; 2025 Almutaqi | Fullstack Web Developer. All rights reserved.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
