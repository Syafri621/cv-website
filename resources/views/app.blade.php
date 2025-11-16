<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Portfolio - ' . ($biodata->nama_lengkap ?? ''))</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #6C63FF;
            --primary-dark: #564FD8;
            --primary-light: #8B85FF;
            --secondary: #1E1E2E;
            --accent: #FF6B6B;
            --dark: #121212;
            --light: #FFFFFF;
            --gray: #8C8A9D;
            --card-bg: #2D2B3D;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--dark);
            color: var(--light);
            line-height: 1.6;
            overflow-x: hidden;
            position: relative;
        }

        /* Background Animasi */
        .animated-bg {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            overflow: hidden;
            background: var(--dark);
        }

        .gradient-bg {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: 
                radial-gradient(circle at 20% 80%, rgba(108, 99, 255, 0.08) 0%, transparent 50%),
                radial-gradient(circle at 80% 20%, rgba(255, 107, 107, 0.05) 0%, transparent 50%),
                radial-gradient(circle at 40% 40%, rgba(139, 133, 255, 0.03) 0%, transparent 50%);
            animation: gradientShift 15s ease-in-out infinite;
        }

        .floating-shapes {
            position: absolute;
            width: 100%;
            height: 100%;
        }

        .shape {
            position: absolute;
            background: rgba(108, 99, 255, 0.05);
            border-radius: 50%;
            animation: float 8s ease-in-out infinite;
        }

        .shape:nth-child(1) {
            width: 120px;
            height: 120px;
            top: 15%;
            left: 10%;
            animation-delay: 0s;
        }

        .shape:nth-child(2) {
            width: 80px;
            height: 80px;
            top: 65%;
            left: 85%;
            animation-delay: 2s;
        }

        .shape:nth-child(3) {
            width: 60px;
            height: 60px;
            top: 80%;
            left: 15%;
            animation-delay: 4s;
        }

        .shape:nth-child(4) {
            width: 100px;
            height: 100px;
            top: 25%;
            left: 75%;
            animation-delay: 6s;
        }

        .grid-pattern {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: 
                linear-gradient(rgba(108, 99, 255, 0.03) 1px, transparent 1px),
                linear-gradient(90deg, rgba(108, 99, 255, 0.03) 1px, transparent 1px);
            background-size: 50px 50px;
            animation: gridMove 20s linear infinite;
        }
        
        /* Navigasi */
        .navbar {
            background: rgba(30, 30, 46, 0.95);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(108, 99, 255, 0.2);
            padding: 1.2rem 0;
            transition: all 0.3s ease;
        }
        
        .navbar-brand {
            font-weight: 700;
            font-size: 1.5rem;
            color: var(--primary) !important;
        }
        
        .nav-link {
            font-weight: 500;
            color: var(--light) !important;
            margin: 0 0.8rem;
            transition: all 0.3s ease;
            position: relative;
        }
        
        .nav-link:hover, .nav-link.active {
            color: var(--primary) !important;
        }
        
        .nav-link::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 0;
            height: 2px;
            background: var(--primary);
            transition: width 0.3s ease;
        }
        
        .nav-link:hover::after, .nav-link.active::after {
            width: 100%;
        }

        /* Section Hero */
        .hero-section {
            background: linear-gradient(135deg, var(--secondary) 0%, var(--dark) 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            position: relative;
            overflow: hidden;
        }

        .hero-section::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -20%;
            width: 600px;
            height: 600px;
            background: linear-gradient(45deg, var(--primary) 0%, transparent 70%);
            border-radius: 50%;
            opacity: 0.1;
        }

        .hero-content {
            position: relative;
            z-index: 2;
        }

        .hero-title {
            font-size: 3.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
            line-height: 1.2;
            color: var(--light);
        }

        .hero-title .text-primary {
            color: var(--primary) !important;
        }

        .hero-subtitle {
            font-size: 1.3rem;
            font-weight: 500;
            margin-bottom: 2rem;
            color: var(--primary);
        }

        .hero-description {
            font-size: 1.1rem;
            color: var(--gray);
            margin-bottom: 2.5rem;
            line-height: 1.8;
        }

        /* Tombol */
        .btn-primary-custom {
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            border: none;
            padding: 14px 35px;
            border-radius: 50px;
            font-weight: 600;
            color: white;
            transition: all 0.3s ease;
            box-shadow: 0 5px 20px rgba(108, 99, 255, 0.3);
        }

        .btn-primary-custom:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 30px rgba(108, 99, 255, 0.4);
            color: white;
        }

        .btn-outline-custom {
            border: 2px solid var(--primary);
            color: var(--primary);
            background: transparent;
            padding: 14px 35px;
            border-radius: 50px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-outline-custom:hover {
            background: var(--primary);
            color: white;
            transform: translateY(-3px);
            box-shadow: 0 10px 30px rgba(108, 99, 255, 0.3);
        }

        /* Judul Section */
        .section-title {
            font-size: 2.8rem;
            font-weight: 700;
            text-align: center;
            margin-bottom: 3rem;
            color: var(--light);
            position: relative;
        }

        .section-title::after {
            content: '';
            display: block;
            width: 80px;
            height: 4px;
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-light) 100%);
            margin: 1.5rem auto;
            border-radius: 2px;
        }

        /* Kartu */
        .card-custom {
            border: none;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
            transition: all 0.3s ease;
            overflow: hidden;
            background: var(--card-bg);
            border: 1px solid rgba(108, 99, 255, 0.1);
        }

        .card-custom:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(108, 99, 255, 0.2);
            border-color: rgba(108, 99, 255, 0.3);
        }

        /* Section Skills */
        .skills-section {
            background: var(--secondary);
        }

        .skill-card {
            background: var(--card-bg);
            padding: 2.5rem;
            border-radius: 15px;
            height: 100%;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
            border: 1px solid rgba(108, 99, 255, 0.1);
        }

        /* Header Kategori Skills */
        .skill-category-header {
            margin-bottom: 1.5rem;
        }

        .skill-category-header h4 {
            color: var(--primary);
            font-weight: 600;
            font-size: 1.3rem;
            margin-bottom: 0.8rem;
        }

        .category-divider {
            height: 2px;
            background: linear-gradient(90deg, 
                var(--primary) 0%, 
                var(--primary-light) 50%, 
                transparent 100%);
            border-radius: 2px;
            margin-bottom: 1rem;
        }

        /* Daftar Skills */
        .skill-item {
            transition: all 0.3s ease;
        }

        .skill-item:hover {
            background: rgba(108, 99, 255, 0.05);
            border-radius: 8px;
            padding: 0 0.5rem;
        }

        .skill-name {
            font-weight: 500;
            font-size: 1rem;
        }

        .skill-level-badge {
            background: rgba(108, 99, 255, 0.15);
            color: var(--primary-light);
            padding: 0.4rem 1rem;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 500;
            border: 1px solid rgba(108, 99, 255, 0.3);
            min-width: 80px;
            text-align: center;
        }

        .skill-divider-light {
            height: 1px;
            background: rgba(255, 255, 255, 0.1);
            margin: 0.3rem 0;
        }

        /* Section Portfolio */
        .portfolio-section {
            background: var(--dark);
        }

        .portfolio-item {
            position: relative;
            overflow: hidden;
            border-radius: 15px;
            margin-bottom: 2rem;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
            background: var(--card-bg);
            border: 1px solid rgba(108, 99, 255, 0.1);
            transition: all 0.3s ease;
        }

        .portfolio-item:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(108, 99, 255, 0.2);
        }

        /* Gambar Portfolio */
        .portfolio-img-container {
            position: relative;
            overflow: hidden;
            border-radius: 15px 15px 0 0;
            height: 200px;
        }

        .portfolio-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .portfolio-img-container:hover .portfolio-img {
            transform: scale(1.1);
        }

        .portfolio-img-placeholder {
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            transition: transform 0.3s ease;
        }

        .portfolio-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(108, 99, 255, 0.9) 0%, rgba(86, 79, 216, 0.9) 100%);
            color: white;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            opacity: 0;
            transition: opacity 0.3s ease;
            padding: 2rem;
        }

        .portfolio-img-container:hover .portfolio-overlay {
            opacity: 1;
        }

        .portfolio-content {
            padding: 1.5rem;
        }

        .portfolio-content h5 {
            color: var(--light);
            margin-bottom: 0.5rem;
            font-weight: 600;
        }

        .portfolio-year {
            color: var(--primary);
            font-weight: 600;
            font-size: 0.9rem;
            margin-bottom: 0.5rem;
        }

        .portfolio-content p {
            color: var(--gray);
            font-size: 0.9rem;
            margin-bottom: 1rem;
        }

        .portfolio-tech {
            display: flex;
            flex-wrap: wrap;
            gap: 0.5rem;
            margin-bottom: 1rem;
        }

        .tech-tag {
            background: rgba(108, 99, 255, 0.2);
            color: var(--primary-light);
            padding: 0.3rem 0.8rem;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 500;
        }

        .portfolio-links {
            display: flex;
            gap: 0.8rem;
        }

        .portfolio-links .btn {
            flex: 1;
            padding: 0.5rem 1rem;
            font-size: 0.9rem;
        }

        /* Modal Gelap - DIPERBAIKI */
        .modal-content {
            background: var(--card-bg) !important;
            border: 1px solid rgba(108, 99, 255, 0.2) !important;
            border-radius: 15px !important;
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.5) !important;
            color: var(--light) !important;
        }

        .modal-header {
            border-bottom: 1px solid rgba(108, 99, 255, 0.2) !important;
            background: rgba(45, 43, 61, 0.8) !important;
            backdrop-filter: blur(10px) !important;
            border-radius: 15px 15px 0 0 !important;
            padding: 1.5rem 2rem !important;
        }

        .modal-title {
            color: var(--primary) !important;
            font-weight: 600 !important;
            font-size: 1.5rem !important;
        }

        .modal-body {
            padding: 2rem !important;
            background: var(--card-bg) !important;
            color: var(--light) !important;
        }

        .modal-footer {
            border-top: 1px solid rgba(108, 99, 255, 0.2) !important;
            background: rgba(45, 43, 61, 0.8) !important;
            backdrop-filter: blur(10px) !important;
            border-radius: 0 0 15px 15px !important;
            padding: 1.5rem 2rem !important;
        }

        .btn-close {
            filter: invert(1) brightness(2) !important;
            opacity: 0.8 !important;
        }

        .btn-close:hover {
            opacity: 1 !important;
        }

        .project-detail-img {
            width: 100%;
            border-radius: 10px;
            margin-bottom: 1.5rem;
            border: 1px solid rgba(108, 99, 255, 0.2);
        }

        .project-info h6 {
            color: var(--primary);
            font-weight: 600;
            margin-bottom: 1rem;
            font-size: 1.1rem;
        }

        .project-info p {
            color: var(--gray);
            margin-bottom: 1.5rem;
            line-height: 1.6;
        }

        .project-meta {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-bottom: 1.5rem;
            padding: 1rem;
            background: rgba(108, 99, 255, 0.1);
            border-radius: 10px;
            border: 1px solid rgba(108, 99, 255, 0.2);
        }

        .project-year {
            background: var(--primary);
            color: white;
            padding: 0.4rem 1rem;
            border-radius: 20px;
            font-size: 0.9rem;
            font-weight: 600;
        }

        .tech-stack {
            margin-top: 1.5rem;
        }

        .tech-stack h6 {
            color: var(--primary);
            margin-bottom: 0.8rem;
        }

        .tech-badges {
            display: flex;
            flex-wrap: wrap;
            gap: 0.5rem;
        }

        .tech-badge {
            background: rgba(108, 99, 255, 0.2);
            color: var(--primary-light);
            padding: 0.5rem 1rem;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 500;
            border: 1px solid rgba(108, 99, 255, 0.3);
            transition: all 0.3s ease;
        }

        .tech-badge:hover {
            background: rgba(108, 99, 255, 0.3);
            transform: translateY(-2px);
        }

        /* Section Kontak */
        .contact-section {
            background: var(--secondary);
            color: white;
        }

        .contact-info-item {
            background: var(--card-bg);
            padding: 2rem;
            border-radius: 15px;
            border: 1px solid rgba(108, 99, 255, 0.1);
            transition: all 0.3s ease;
            text-align: center;
        }

        .contact-info-item:hover {
            transform: translateY(-5px);
            border-color: rgba(108, 99, 255, 0.3);
        }

        /* Footer */
        .footer {
            background: var(--secondary);
            color: white;
            padding: 3rem 0 1.5rem;
            border-top: 1px solid rgba(108, 99, 255, 0.1);
        }

        .social-links a {
            color: var(--light);
            font-size: 1.3rem;
            margin: 0 0.8rem;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 45px;
            height: 45px;
            border-radius: 50%;
            background: var(--card-bg);
            border: 1px solid rgba(108, 99, 255, 0.1);
        }

        .social-links a:hover {
            color: var(--primary);
            background: var(--primary-light);
            transform: translateY(-3px);
            border-color: var(--primary);
        }

        /* Animasi */
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }

        @keyframes gradientShift {
            0%, 100% { 
                background-position: 0% 50%, 100% 50%, 50% 50%;
            }
            50% { 
                background-position: 100% 50%, 0% 50%, 80% 80%;
            }
        }

        @keyframes gridMove {
            0% { transform: translate(0, 0); }
            100% { transform: translate(50px, 50px); }
        }

        /* Responsif */
        @media (max-width: 768px) {
            .hero-title {
                font-size: 2.5rem;
            }
            
            .hero-subtitle {
                font-size: 1.1rem;
            }
            
            .section-title {
                font-size: 2.2rem;
            }
            
            .nav-link {
                margin: 0.5rem 0;
                text-align: center;
            }
            
            .portfolio-img-container {
                height: 180px;
            }

            .modal-header,
            .modal-body,
            .modal-footer {
                padding: 1rem !important;
            }
        }
    </style>
</head>
<body>
    <!-- Background Animasi -->
    <div class="animated-bg">
        <div class="gradient-bg"></div>
        <div class="floating-shapes">
            <div class="shape"></div>
            <div class="shape"></div>
            <div class="shape"></div>
            <div class="shape"></div>
        </div>
        <div class="grid-pattern"></div>
    </div>

    <!-- Navigasi -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#home">
                <i class="fas fa-code me-2"></i>Portfolio
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="#home">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">Tentang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#skills">Keahlian</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#portfolio">Portfolio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">Kontak</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <p>&copy; 2025 {{ $biodata->nama_lengkap ?? 'Portfolio Saya' }}. Semua hak dilindungi.</p>
                </div>
                <div class="col-md-6 text-md-end">
                    <div class="social-links">
                        <a href="https://github.com/Syafri621" target="_blank" title="GitHub">
                            <i class="fab fa-github"></i>
                        </a>
                        <a href="https://www.linkedin.com/in/syafri-f-p-041b41293/" target="_blank" title="LinkedIn">
                            <i class="fab fa-linkedin"></i>
                        </a>
                        <a href="https://www.instagram.com/saylessyk/" target="_blank" title="Instagram">
                            <i class="fab fa-instagram"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Modal Detail Project -->
    <div class="modal fade" id="projectModal" tabindex="-1">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Website Portfolio Pribadi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <img src="{{ asset('assets/images/portofolio/Portofolio.jpg') }}" 
                                 alt="Website Portfolio Pribadi" class="project-detail-img">
                        </div>
                        <div class="col-md-6">
                            <div class="project-info">
                                <h6>Detail Project</h6>
                                <p>Website portfolio pribadi yang responsif dengan desain modern dan form kontak terintegrasi. Dibangun dengan teknologi web modern untuk menampilkan karya dan pengalaman profesional.</p>
                                
                                <div class="project-meta">
                                    <span class="project-year">2025</span>
                                    <span class="text-gray">Project Pribadi</span>
                                </div>

                                <div class="tech-stack">
                                    <h6>Teknologi yang Digunakan:</h6>
                                    <div class="tech-badges">
                                        <span class="tech-badge">HTML5</span>
                                        <span class="tech-badge">CSS3</span>
                                        <span class="tech-badge">JavaScript</span>
                                        <span class="tech-badge">PHP</span>
                                        <span class="tech-badge">Bootstrap</span>
                                        <span class="tech-badge">Laravel</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="https://github.com/Syafri621" target="_blank" class="btn btn-primary-custom">
                        <i class="fab fa-github me-2"></i>Lihat Kode Sumber
                    </a>
                    <button type="button" class="btn btn-outline-custom" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Perubahan background navbar saat scroll
        window.addEventListener('scroll', function() {
            const navbar = document.querySelector('.navbar');
            if (window.scrollY > 100) {
                navbar.style.background = 'rgba(30, 30, 46, 0.98)';
                navbar.style.boxShadow = '0 5px 30px rgba(0, 0, 0, 0.3)';
            } else {
                navbar.style.background = 'rgba(30, 30, 46, 0.95)';
                navbar.style.boxShadow = 'none';
            }
        });
        
        // Scroll halus
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Update nav link aktif saat scroll
        window.addEventListener('scroll', function() {
            const sections = document.querySelectorAll('section');
            const navLinks = document.querySelectorAll('.nav-link');
            
            let current = '';
            sections.forEach(section => {
                const sectionTop = section.offsetTop;
                const sectionHeight = section.clientHeight;
                if (scrollY >= (sectionTop - 100)) {
                    current = section.getAttribute('id');
                }
            });

            navLinks.forEach(link => {
                link.classList.remove('active');
                if (link.getAttribute('href') === `#${current}`) {
                    link.classList.add('active');
                }
            });
        });

        // Animasi loading
        document.addEventListener('DOMContentLoaded', function() {
            // Animasikan elemen saat scroll
            const animateOnScroll = function() {
                const elements = document.querySelectorAll('.skill-card, .portfolio-item, .card-custom');
                
                elements.forEach(element => {
                    const elementTop = element.getBoundingClientRect().top;
                    const elementVisible = 150;
                    
                    if (elementTop < window.innerHeight - elementVisible) {
                        element.style.opacity = "1";
                        element.style.transform = "translateY(0)";
                    }
                });
            };

            // Set state awal
            const elements = document.querySelectorAll('.skill-card, .portfolio-item, .card-custom');
            elements.forEach(element => {
                element.style.opacity = "0";
                element.style.transform = "translateY(30px)";
                element.style.transition = "opacity 0.6s ease, transform 0.6s ease";
            });

            // Dengarkan event scroll
            window.addEventListener('scroll', animateOnScroll);
            
            // Pengecekan awal
            animateOnScroll();
        });

        // Fungsi untuk membuka modal project
        function openProjectModal() {
            const projectModal = new bootstrap.Modal(document.getElementById('projectModal'));
            projectModal.show();
        }
    </script>
</body>
</html>