@extends('app')

@section('title', 'Portfolio - ' . $biodata->nama_lengkap)

@section('content')
    <!-- Hero Section -->
    <section id="home" class="hero-section">
        <div class="container">
            <div class="row align-items-center min-vh-100">
                <div class="col-lg-6">
                    <div class="hero-content">
                        <h1 class="hero-title">Hi, I'm <span class="text-primary-custom">{{ $biodata->nama_lengkap }}</span></h1>
                        <h2 class="hero-subtitle">{{ $biodata->posisi }}</h2>
                        <p class="hero-description">
                            {{ $biodata->tentang_saya }}
                        </p>
                        <div class="d-flex flex-wrap gap-3">
                            <a href="#portfolio" class="btn btn-primary-custom">
                                <i class="fas fa-briefcase me-2"></i>View My Work
                            </a>
                            <a href="#contact" class="btn btn-outline-custom">
                                <i class="fas fa-paper-plane me-2"></i>Hire Me
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

    <!-- About Section -->
    <section id="about" class="py-5">
        <div class="container">
            <h2 class="section-title">About Me</h2>
            <div class="row">
                <div class="col-lg-10 mx-auto">
                    <div class="row">
                        <div class="col-md-4 mb-4">
                            <div class="card-custom p-4 text-center h-100">
                                <div class="icon-wrapper mb-3" style="width: 70px; height: 70px; background: linear-gradient(135deg, var(--primary) 0%, var(--primary-light) 100%); border-radius: 15px; display: flex; align-items: center; justify-content: center; margin: 0 auto;">
                                    <i class="fas fa-graduation-cap fa-2x text-white"></i>
                                </div>
                                <h5 class="fw-bold mb-2 text-light">Education</h5>
                                <p class="text-gray">{{ $biodata->pendidikan->count() }} Degrees</p>
                                <small class="text-primary-custom">Continuous Learner</small>
                            </div>
                        </div>
                        <div class="col-md-4 mb-4">
                            <div class="card-custom p-4 text-center h-100">
                                <div class="icon-wrapper mb-3" style="width: 70px; height: 70px; background: linear-gradient(135deg, var(--primary) 0%, var(--primary-light) 100%); border-radius: 15px; display: flex; align-items: center; justify-content: center; margin: 0 auto;">
                                    <i class="fas fa-briefcase fa-2x text-white"></i>
                                </div>
                                <h5 class="fw-bold mb-2 text-light">Experience</h5>
                                <p class="text-gray">{{ $biodata->pengalaman->count() }}+ Projects</p>
                                <small class="text-primary-custom">Problem Solver</small>
                            </div>
                        </div>
                        <div class="col-md-4 mb-4">
                            <div class="card-custom p-4 text-center h-100">
                                <div class="icon-wrapper mb-3" style="width: 70px; height: 70px; background: linear-gradient(135deg, var(--primary) 0%, var(--primary-light) 100%); border-radius: 15px; display: flex; align-items: center; justify-content: center; margin: 0 auto;">
                                    <i class="fas fa-code fa-2x text-white"></i>
                                </div>
                                <h5 class="fw-bold mb-2 text-light">Skills</h5>
                                <p class="text-gray">{{ $biodata->keahlian->count() }}+ Technologies</p>
                                <small class="text-primary-custom">Tech Enthusiast</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Skills Section -->
    <section id="skills" class="py-5 skills-section">
        <div class="container">
            <h2 class="section-title">Technical Skills</h2>
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

    <!-- Portfolio Section -->
    <!-- Portfolio Section -->
<section id="portfolio" class="py-5 portfolio-section">
    <div class="container">
        <h2 class="section-title">My Portfolio</h2>
        <div class="row">
            @foreach($biodata->portofolio as $portfolio)
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="portfolio-item">
                    <div class="portfolio-img-container">
                        @if($portfolio->id == 1)
                            <!-- MoneySaving.jpg untuk project pertama -->
                            @if(file_exists(public_path('assets/images/portofolio/MoneySaving.jpg')))
                                <img src="{{ asset('assets/images/portofolio/MoneySaving.jpg') }}" 
                                     alt="{{ $portfolio->judul }}" class="portfolio-img">
                            @else
                                <div class="portfolio-img-placeholder">
                                    <i class="fas fa-piggy-bank fa-3x text-white"></i>
                                </div>
                            @endif
                        @elseif($portfolio->id == 2)
                            <!-- Portofolio.jpg untuk project kedua (tengah) -->
                            @if(file_exists(public_path('assets/images/portofolio/Portofolio.jpg')))
                                <img src="{{ asset('assets/images/portofolio/Portofolio.jpg') }}" 
                                     alt="{{ $portfolio->judul }}" class="portfolio-img">
                            @else
                                <div class="portfolio-img-placeholder">
                                    <i class="fas fa-laptop-code fa-3x text-white"></i>
                                </div>
                            @endif
                        @else
                            <!-- Default image untuk project lainnya -->
                            @if(file_exists(public_path('assets/images/portofolio/default.jpg')))
                                <img src="{{ asset('assets/images/portofolio/default.jpg') }}" 
                                     alt="{{ $portfolio->judul }}" class="portfolio-img">
                            @else
                                <div class="portfolio-img-placeholder">
                                    <i class="fas fa-project-diagram fa-3x text-white"></i>
                                </div>
                            @endif
                        @endif
                        <div class="portfolio-overlay">
                            <h4 class="mb-2">{{ $portfolio->judul }}</h4>
                            <p class="text-center mb-3">{{ Str::limit($portfolio->deskripsi, 100) }}</p>
                            <div class="d-flex gap-2">
                                @if($portfolio->link)
                                <a href="{{ $portfolio->link }}" target="_blank" class="btn btn-light btn-sm">
                                    <i class="fab fa-github me-1"></i> GitHub
                                </a>
                                @endif
                                <button class="btn btn-outline-light btn-sm" data-bs-toggle="modal" data-bs-target="#portfolioModal{{ $portfolio->id }}">
                                    <i class="fas fa-eye me-1"></i> View
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="portfolio-content">
                        <h5>{{ $portfolio->judul }}</h5>
                        <p class="portfolio-year">{{ $portfolio->tahun }}</p>
                        <p>{{ Str::limit($portfolio->deskripsi, 120) }}</p>
                        
                        <div class="portfolio-tech">
                            @php
                                $techStack = [
                                    1 => ['Laravel', 'MySQL', 'Bootstrap', 'Chart.js'],
                                    2 => ['HTML/CSS', 'JavaScript', 'PHP', 'MySQL'],
                                    3 => ['CodeIgniter', 'jQuery', 'Bootstrap']
                                ];
                            @endphp
                            @foreach(($techStack[$portfolio->id] ?? ['Laravel', 'Vue.js', 'MySQL']) as $tech)
                            <span class="tech-tag">{{ $tech }}</span>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="portfolioModal{{ $portfolio->id }}" tabindex="-1">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content" style="background: var(--card-bg); color: var(--light);">
                        <div class="modal-header border-0">
                            <h5 class="modal-title text-primary-custom">{{ $portfolio->judul }}</h5>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-8">
                                    <p><strong>Description:</strong></p>
                                    <p class="mb-3 text-gray">{{ $portfolio->deskripsi }}</p>
                                    <p><strong>Year:</strong> <span class="text-primary-custom">{{ $portfolio->tahun }}</span></p>
                                    
                                    <div class="mt-4">
                                        <h6 class="text-light mb-3">Technologies Used:</h6>
                                        <div class="d-flex flex-wrap gap-2">
                                            @foreach(($techStack[$portfolio->id] ?? ['Laravel', 'Vue.js', 'MySQL']) as $tech)
                                            <span class="tech-tag">{{ $tech }}</span>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 text-center">
                                    @if($portfolio->id == 1 && file_exists(public_path('assets/images/portofolio/MoneySaving.jpg')))
                                        <img src="{{ asset('assets/images/portofolio/MoneySaving.jpg') }}" 
                                             alt="{{ $portfolio->judul }}" class="img-fluid rounded" style="max-height: 200px; object-fit: cover;">
                                    @elseif($portfolio->id == 2 && file_exists(public_path('assets/images/portofolio/Portofolio.jpg')))
                                        <img src="{{ asset('assets/images/portofolio/Portofolio.jpg') }}" 
                                             alt="{{ $portfolio->judul }}" class="img-fluid rounded" style="max-height: 200px; object-fit: cover;">
                                    @else
                                        <div class="portfolio-img-placeholder h-100 d-flex align-items-center justify-content-center rounded">
                                            <i class="fas fa-laptop-code fa-4x text-white"></i>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer border-0">
                            @if($portfolio->link)
                            <a href="{{ $portfolio->link }}" target="_blank" class="btn btn-primary-custom">
                                <i class="fab fa-github me-2"></i>View on GitHub
                            </a>
                            @endif
                            <button type="button" class="btn btn-outline-custom" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

                <!-- Modal -->
                <div class="modal fade" id="portfolioModal{{ $portfolio->id }}" tabindex="-1">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content" style="background: var(--card-bg); color: var(--light);">
                            <div class="modal-header border-0">
                                <h5 class="modal-title text-primary-custom">{{ $portfolio->judul }}</h5>
                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-8">
                                        <p><strong>Description:</strong></p>
                                        <p class="mb-3 text-gray">{{ $portfolio->deskripsi }}</p>
                                        <p><strong>Year:</strong> <span class="text-primary-custom">{{ $portfolio->tahun }}</span></p>
                                        
                                        <div class="mt-4">
                                            <h6 class="text-light mb-3">Technologies Used:</h6>
                                            <div class="d-flex flex-wrap gap-2">
                                                @foreach(($techStack[$portfolio->id] ?? ['Laravel', 'Vue.js', 'MySQL']) as $tech)
                                                <span class="tech-tag">{{ $tech }}</span>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 text-center">
                                        <div class="portfolio-img-placeholder h-100 d-flex align-items-center justify-content-center">
                                            <i class="fas fa-laptop-code fa-4x text-white"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer border-0">
                                @if($portfolio->link)
                                <a href="{{ $portfolio->link }}" target="_blank" class="btn btn-primary-custom">
                                    <i class="fab fa-github me-2"></i>View on GitHub
                                </a>
                                @endif
                                <button type="button" class="btn btn-outline-custom" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="py-5 contact-section">
        <div class="container">
            <h2 class="section-title">Get In Touch</h2>
            <div class="row">
                <div class="col-lg-8 mx-auto text-center">
                    <p class="lead mb-5 text-gray">I'm always interested in new opportunities and exciting projects. Let's create something amazing together!</p>
                    
                    <div class="row">
                        <div class="col-md-4 mb-4">
                            <div class="contact-info-item">
                                <i class="fas fa-envelope fa-2x mb-3 text-primary-custom"></i>
                                <h6 class="text-light">Email</h6>
                                <a href="mailto:{{ $biodata->email }}" class="text-gray text-decoration-none">{{ $biodata->email }}</a>
                            </div>
                        </div>
                        <div class="col-md-4 mb-4">
                            <div class="contact-info-item">
                                <i class="fas fa-phone fa-2x mb-3 text-primary-custom"></i>
                                <h6 class="text-light">Phone</h6>
                                <a href="tel:{{ $biodata->telepon }}" class="text-gray text-decoration-none">{{ $biodata->telepon }}</a>
                            </div>
                        </div>
                        <div class="col-md-4 mb-4">
                            <div class="contact-info-item">
                                <i class="fas fa-map-marker-alt fa-2x mb-3 text-primary-custom"></i>
                                <h6 class="text-light">Location</h6>
                                <span class="text-gray">{{ $biodata->alamat }}</span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="mt-5">
                        <a href="mailto:{{ $biodata->email }}" class="btn btn-primary-custom btn-lg px-5 py-3">
                            <i class="fas fa-paper-plane me-2"></i>Send Message
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection