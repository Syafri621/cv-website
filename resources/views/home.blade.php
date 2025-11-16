@extends('app')

@section('title', 'Portfolio - ' . $biodata->nama_lengkap)

@section('content')
    <!-- Section Hero -->
    <section id="home" class="hero-section">
        <div class="container">
            <div class="row align-items-center min-vh-100">
                <div class="col-lg-6">
                    <div class="hero-content">
                        <h1 class="hero-title">Hai, Saya <span class="text-primary-custom">{{ $biodata->nama_lengkap }}</span></h1>
                        <h2 class="hero-subtitle">{{ $biodata->posisi }}</h2>
                        <p class="hero-description">
                            {{ $biodata->tentang_saya }}
                        </p>
                        <div class="d-flex flex-wrap gap-3">
                            <a href="#portfolio" class="btn btn-primary-custom">
                                <i class="fas fa-briefcase me-2"></i>Lihat Karya Saya
                            </a>
                            <a href="#contact" class="btn btn-outline-custom">
                                <i class="fas fa-paper-plane me-2"></i>Hubungi Saya
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 text-center">
                    <div class="floating">
                        @if($biodata->foto && file_exists(public_path($biodata->foto)))
                            <img src="{{ asset($biodata->foto) }}" alt="{{ $biodata->nama_lengkap }}" 
                                 class="img-fluid rounded-circle" style="width: 400px; height: 400px; object-fit: cover; border: 8px solid rgba(108, 99, 255, 0.2); box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);">
                        @else
                            <div class="rounded-circle d-inline-flex align-items-center justify-content-center" 
                                 style="width: 400px; height: 400px; border: 8px solid rgba(108, 99, 255, 0.2); background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%); box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);">
                                <span class="display-1 text-white fw-bold">{{ substr($biodata->nama_lengkap, 0, 1) }}</span>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section Tentang -->
    <section id="about" class="py-5">
        <div class="container">
            <h2 class="section-title">Tentang Saya</h2>
            <div class="row">
                <div class="col-lg-10 mx-auto">
                    <div class="row">
                        <div class="col-md-4 mb-4">
                            <div class="card-custom p-4 text-center h-100">
                                <div class="icon-wrapper mb-3" style="width: 70px; height: 70px; background: linear-gradient(135deg, var(--primary) 0%, var(--primary-light) 100%); border-radius: 15px; display: flex; align-items: center; justify-content: center; margin: 0 auto;">
                                    <i class="fas fa-graduation-cap fa-2x text-white"></i>
                                </div>
                                <h5 class="fw-bold mb-2 text-light">Pendidikan</h5>
                                <p class="text-gray">{{ $biodata->pendidikan->count() }} Gelar</p>
                                <small class="text-primary-custom">Pembelajar Aktif</small>
                            </div>
                        </div>
                        <div class="col-md-4 mb-4">
                            <div class="card-custom p-4 text-center h-100">
                                <div class="icon-wrapper mb-3" style="width: 70px; height: 70px; background: linear-gradient(135deg, var(--primary) 0%, var(--primary-light) 100%); border-radius: 15px; display: flex; align-items: center; justify-content: center; margin: 0 auto;">
                                    <i class="fas fa-briefcase fa-2x text-white"></i>
                                </div>
                                <h5 class="fw-bold mb-2 text-light">Pengalaman</h5>
                                <p class="text-gray">{{ $biodata->pengalaman->count() }}+ Proyek</p>
                                <small class="text-primary-custom">Pemecah Masalah</small>
                            </div>
                        </div>
                        <div class="col-md-4 mb-4">
                            <div class="card-custom p-4 text-center h-100">
                                <div class="icon-wrapper mb-3" style="width: 70px; height: 70px; background: linear-gradient(135deg, var(--primary) 0%, var(--primary-light) 100%); border-radius: 15px; display: flex; align-items: center; justify-content: center; margin: 0 auto;">
                                    <i class="fas fa-code fa-2x text-white"></i>
                                </div>
                                <h5 class="fw-bold mb-2 text-light">Keahlian</h5>
                                <p class="text-gray">{{ $biodata->keahlian->count() }}+ Teknologi</p>
                                <small class="text-primary-custom">Pecinta Teknologi</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section Keahlian -->
    <section id="skills" class="py-5 skills-section">
        <div class="container">
            <h2 class="section-title">Keahlian Teknis</h2>
            <div class="row">
                @php
                    $kategori = $biodata->keahlian->unique('kategori');
                @endphp
                
                @foreach($kategori as $kat)
                <div class="col-lg-6 mb-4">
                    <div class="skill-card">
                        <div class="skill-category-header">
                            <h4 class="mb-3">
                                <i class="fas fa-folder me-2"></i>{{ $kat->kategori }}
                            </h4>
                            <div class="category-divider"></div>
                        </div>
                        <div class="skills-list">
                            @foreach($biodata->keahlian->where('kategori', $kat->kategori) as $skill)
                            <div class="skill-item">
                                <div class="d-flex justify-content-between align-items-center py-2">
                                    <span class="skill-name text-light">{{ $skill->nama_keahlian }}</span>
                                    <span class="skill-level-badge">
                                        {{ ucfirst($skill->tingkat) }}
                                    </span>
                                </div>
                            </div>
                            @if(!$loop->last)
                            <div class="skill-divider-light"></div>
                            @endif
                            @endforeach
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Section Portfolio -->
    <section id="portfolio" class="py-5 portfolio-section">
        <div class="container">
            <h2 class="section-title text-center mb-5">Portfolio Saya</h2>
            
            <div class="row g-4 justify-content-center">
                @foreach($biodata->portofolio as $portfolio)
                <div class="col-xl-4 col-lg-6 col-md-6 mb-4">
                    <div class="portfolio-card h-100">
                        <!-- Gambar Portfolio -->
                        <div class="portfolio-image-wrapper">
                            @if($portfolio->id == 1 && file_exists(public_path('assets/images/portofolio/MoneySaving.jpg')))
                                <img src="{{ asset('assets/images/portofolio/MoneySaving.jpg') }}" 
                                     alt="{{ $portfolio->judul }}" class="portfolio-image">
                            @elseif($portfolio->id == 2 && file_exists(public_path('assets/images/portofolio/Portofolio.jpg')))
                                <img src="{{ asset('assets/images/portofolio/Portofolio.jpg') }}" 
                                     alt="{{ $portfolio->judul }}" class="portfolio-image">
                            @else
                                <div class="portfolio-image-placeholder">
                                    <i class="fas fa-project-diagram fa-3x"></i>
                                </div>
                            @endif
                            
                            <!-- Overlay dengan aksi -->
                            <div class="portfolio-overlay">
                                <div class="overlay-content">
                                    <h5 class="overlay-title">{{ $portfolio->judul }}</h5>
                                    <p class="overlay-desc">{{ Str::limit($portfolio->deskripsi, 80) }}</p>
                                    <div class="overlay-actions">
                                        @if($portfolio->link)
                                        <a href="{{ $portfolio->link }}" target="_blank" class="btn btn-sm btn-light me-2">
                                            <i class="fab fa-github me-1"></i> Kode
                                        </a>
                                        @endif
                                        <button class="btn btn-sm btn-outline-light" 
                                                data-bs-toggle="modal" 
                                                data-bs-target="#portfolioModal{{ $portfolio->id }}">
                                            <i class="fas fa-eye me-1"></i> Lihat
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Konten Portfolio -->
                        <div class="portfolio-content p-4">
                            <div class="d-flex justify-content-between align-items-start mb-2">
                                <h5 class="portfolio-title mb-0">{{ $portfolio->judul }}</h5>
                                <span class="portfolio-year badge bg-primary">{{ $portfolio->tahun }}</span>
                            </div>
                            
                            <p class="portfolio-description text-muted mb-3">
                                {{ Str::limit($portfolio->deskripsi, 100) }}
                            </p>
                            
                            <!-- Tech Stack -->
                            <div class="portfolio-tech mb-3">
                                @php
                                    $techStack = [
                                        1 => ['Laravel', 'MySQL', 'Bootstrap', 'Chart.js'],
                                        2 => ['HTML5', 'CSS3', 'JavaScript', 'PHP'],
                                        3 => ['CodeIgniter', 'jQuery', 'Bootstrap', 'MySQL']
                                    ];
                                @endphp
                                
                                <div class="tech-tags">
                                    @foreach(($techStack[$portfolio->id] ?? ['Laravel', 'Vue.js', 'MySQL']) as $tech)
                                    <span class="tech-tag">{{ $tech }}</span>
                                    @endforeach
                                </div>
                            </div>
                            
                            <!-- Tombol Aksi -->
                            <div class="portfolio-actions d-flex gap-2">
                                @if($portfolio->link)
                                <a href="{{ $portfolio->link }}" target="_blank" 
                                   class="btn btn-primary btn-sm flex-fill d-flex align-items-center justify-content-center">
                                    <i class="fab fa-github me-2"></i> 
                                    <span>Kode Sumber</span>
                                </a>
                                @endif
                                <button class="btn btn-outline-primary btn-sm flex-fill d-flex align-items-center justify-content-center"
                                        data-bs-toggle="modal" 
                                        data-bs-target="#portfolioModal{{ $portfolio->id }}">
                                    <i class="fas fa-eye me-2"></i>
                                    <span>Detail</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="portfolioModal{{ $portfolio->id }}" tabindex="-1">
                    <div class="modal-dialog modal-lg modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header bg-dark text-white">
                                <h5 class="modal-title">{{ $portfolio->judul }}</h5>
                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body bg-dark text-white">
                                <div class="row">
                                    <div class="col-md-6">
                                        @if($portfolio->id == 1 && file_exists(public_path('assets/images/portofolio/MoneySaving.jpg')))
                                            <img src="{{ asset('assets/images/portofolio/MoneySaving.jpg') }}" 
                                                 alt="{{ $portfolio->judul }}" class="img-fluid rounded">
                                        @elseif($portfolio->id == 2 && file_exists(public_path('assets/images/portofolio/Portofolio.jpg')))
                                            <img src="{{ asset('assets/images/portofolio/Portofolio.jpg') }}" 
                                                 alt="{{ $portfolio->judul }}" class="img-fluid rounded">
                                        @else
                                            <div class="bg-secondary rounded d-flex align-items-center justify-content-center" style="height: 200px;">
                                                <i class="fas fa-image fa-3x text-white"></i>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-md-6">
                                        <h6 class="text-primary">Detail Proyek</h6>
                                        <p class="mb-3 text-gray">{{ $portfolio->deskripsi }}</p>
                                        
                                        <div class="project-info">
                                            <p><strong>Tahun:</strong> <span class="text-primary">{{ $portfolio->tahun }}</span></p>
                                            
                                            <div class="mt-4">
                                                <h6 class="text-light mb-2">Teknologi yang Digunakan:</h6>
                                                <div class="d-flex flex-wrap gap-2">
                                                    @foreach(($techStack[$portfolio->id] ?? ['Laravel', 'Vue.js', 'MySQL']) as $tech)
                                                    <span class="badge bg-primary">{{ $tech }}</span>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer bg-dark">
                                @if($portfolio->link)
                                <a href="{{ $portfolio->link }}" target="_blank" class="btn btn-primary">
                                    <i class="fab fa-github me-2"></i>Lihat Kode Sumber
                                </a>
                                @endif
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Section Kontak -->
    <section id="contact" class="py-5 contact-section">
        <div class="container">
            <h2 class="section-title text-center mb-5">Hubungi Saya</h2>
            
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    <p class="lead mb-5 text-gray">Saya selalu tertarik dengan peluang baru dan proyek menarik. Mari ciptakan sesuatu yang luar biasa bersama!</p>
                    
                    <div class="row g-4 justify-content-center">
                        <!-- Email -->
                        <div class="col-md-4">
                            <div class="contact-card text-center h-100">
                                <div class="contact-icon-wrapper mb-3">
                                    <i class="fas fa-envelope fa-2x text-primary-custom"></i>
                                </div>
                                <h6 class="text-light mb-2">Email</h6>
                                <a href="mailto:syafritasalab2@gmail.com" class="text-gray text-decoration-none">syafritasalab2@gmail.com</a>
                            </div>
                        </div>
                        
                        <!-- Telepon -->
                        <div class="col-md-4">
                            <div class="contact-card text-center h-100">
                                <div class="contact-icon-wrapper mb-3">
                                    <i class="fas fa-phone fa-2x text-primary-custom"></i>
                                </div>
                                <h6 class="text-light mb-2">Telepon</h6>
                                <a href="tel:08138568536a" class="text-gray text-decoration-none">08138568536a</a>
                            </div>
                        </div>
                        
                        <!-- Lokasi -->
                        <div class="col-md-4">
                            <div class="contact-card text-center h-100">
                                <div class="contact-icon-wrapper mb-3">
                                    <i class="fas fa-map-marker-alt fa-2x text-primary-custom"></i>
                                </div>
                                <h6 class="text-light mb-2">Lokasi</h6>
                                <span class="text-gray">Cibadak, Sukabumi, Indonesia</span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="mt-5">
                        <a href="mailto:syafrifaadilah2@gmail.com" class="btn btn-primary-custom btn-lg px-5 py-3">
                            <i class="fas fa-paper-plane me-2"></i>Kirim Pesan
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <style>
        /* Global Background */
        body {
            background-color: #0f0f1a;
            color: #ffffff;
        }

        /* Hero Section */
        .hero-section {
            background: linear-gradient(135deg, #0f0f1a 0%, #1a1a2e 50%, #16213e 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
        }

        .hero-title {
            font-size: 3.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
            color: #ffffff;
        }

        .hero-subtitle {
            font-size: 1.8rem;
            color: #6c63ff;
            margin-bottom: 1.5rem;
        }

        .hero-description {
            font-size: 1.2rem;
            color: #b0b0b0;
            margin-bottom: 2.5rem;
        }

        .btn-primary-custom {
            background: linear-gradient(135deg, #6c63ff 0%, #4a44c9 100%);
            border: none;
            color: white;
            padding: 12px 30px;
            border-radius: 50px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-primary-custom:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(108, 99, 255, 0.3);
        }

        .btn-outline-custom {
            border: 2px solid #6c63ff;
            color: #6c63ff;
            background: transparent;
            padding: 12px 30px;
            border-radius: 50px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-outline-custom:hover {
            background: #6c63ff;
            color: white;
        }

        /* Section Titles */
        .section-title {
            font-size: 2.5rem;
            font-weight: 700;
            text-align: center;
            margin-bottom: 3rem;
            color: #ffffff;
            position: relative;
        }

        .section-title:after {
            content: '';
            display: block;
            width: 80px;
            height: 4px;
            background: linear-gradient(135deg, #6c63ff 0%, #4a44c9 100%);
            margin: 15px auto;
            border-radius: 2px;
        }

        /* Cards */
        .card-custom {
            background: #1e1e2d;
            border-radius: 15px;
            border: 1px solid #2d2d3d;
            transition: all 0.3s ease;
        }

        .card-custom:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.3);
        }

        .text-primary-custom {
            color: #6c63ff !important;
        }

        .text-gray {
            color: #b0b0b0 !important;
        }

        /* Skills Section */
        .skills-section {
            background: linear-gradient(135deg, #0f0f1a 0%, #1a1a2e 100%);
        }

        .skill-card {
            background: #1e1e2d;
            border-radius: 15px;
            padding: 25px;
            border: 1px solid #2d2d3d;
        }

        /* Portfolio Section */
        .portfolio-section {
            background: linear-gradient(135deg, #0f0f1a 0%, #1a1a2e 100%);
        }

        .portfolio-card {
            background: #1e1e2d;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.3);
            transition: all 0.3s ease;
            overflow: hidden;
            border: 1px solid #2d2d3d;
        }

        .portfolio-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.4);
        }

        .portfolio-image-wrapper {
            position: relative;
            overflow: hidden;
            height: 220px;
        }

        .portfolio-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .portfolio-card:hover .portfolio-image {
            transform: scale(1.05);
        }

        .portfolio-image-placeholder {
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, #6c63ff 0%, #4a44c9 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
        }

        .portfolio-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0,0,0,0.8);
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .portfolio-card:hover .portfolio-overlay {
            opacity: 1;
        }

        .overlay-content {
            text-align: center;
            color: white;
            padding: 20px;
        }

        .portfolio-content {
            background: #1e1e2d;
        }

        .portfolio-title {
            font-weight: 600;
            color: #ffffff;
        }

        .portfolio-description {
            color: #b0b0b0 !important;
        }

        .tech-tags {
            display: flex;
            flex-wrap: wrap;
            gap: 5px;
        }

        .tech-tag {
            background: #2d2d3d;
            color: #b0b0b0;
            padding: 3px 8px;
            border-radius: 12px;
            font-size: 0.75rem;
            font-weight: 500;
        }

        /* Contact Section */
        .contact-section {
            background: linear-gradient(135deg, #0f0f1a 0%, #1a1a2e 100%);
        }

        .contact-card {
            background: #1e1e2d;
            border-radius: 15px;
            padding: 30px 20px;
            border: 1px solid #2d2d3d;
            transition: all 0.3s ease;
            height: 100%;
        }

        .contact-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.3);
        }

        .contact-icon-wrapper {
            width: 70px;
            height: 70px;
            background: rgba(108, 99, 255, 0.1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .hero-title {
                font-size: 2.5rem;
            }
            
            .portfolio-image-wrapper {
                height: 180px;
            }
            
            .contact-card {
                margin-bottom: 20px;
            }
        }
    </style>
@endsection