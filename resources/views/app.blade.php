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
        }
        
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

        /* Hero Section */
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

        /* Buttons */
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

        /* Section Titles */
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

        /* Cards */
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

        /* Skills Section */
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

        /* Skills Category Header */
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

        /* Simple Skills List - No Progress Bars */
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

        /* Portfolio Section */
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

        .portfolio-img-placeholder {
            width: 100%;
            height: 200px;
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            transition: transform 0.3s ease;
        }

        .portfolio-content {
            padding: 1.5rem;
        }

        .portfolio-content h5 {
            color: var(--light);
            margin-bottom: 0.5rem;
            font-weight: 600;
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

        /* Contact Section */
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

        /* Responsive */
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
        }

        /* Animation */
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }

        .floating {
            animation: float 6s ease-in-out infinite;
        }

        /* Text Colors */
        .text-primary-custom {
            color: var(--primary) !important;
        }

        .text-gray {
            color: var(--gray) !important;
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#home">
                <i class="fas fa-code me-2"></i>Pengalaman
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="#home">Halaman Utama</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">Tentang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#skills">Keahlian</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#portfolio">Pengalaman</a>
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
                    <p>&copy; 2025 {{ $biodata->nama_lengkap ?? 'My Portfolio' }}. All rights reserved.</p>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Navbar background change on scroll
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
        
        // Smooth scrolling
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

        // Active nav link update on scroll
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

        // Add loading animation
        document.addEventListener('DOMContentLoaded', function() {
            // Animate elements on scroll
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

            // Set initial state
            const elements = document.querySelectorAll('.skill-card, .portfolio-item, .card-custom');
            elements.forEach(element => {
                element.style.opacity = "0";
                element.style.transform = "translateY(30px)";
                element.style.transition = "opacity 0.6s ease, transform 0.6s ease";
            });

            // Listen for scroll events
            window.addEventListener('scroll', animateOnScroll);
            
            // Initial check
            animateOnScroll();
        });
    </script>
</body>
</html>