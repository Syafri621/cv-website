@extends('app')

@section('title', 'Portofolio - CV ' . $biodata->nama_lengkap)

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-12">
            <h1 class="mb-4">Portofolio</h1>
            <p class="lead mb-5">Berikut adalah beberapa proyek yang telah saya kembangkan:</p>
            
            <div class="row">
                @foreach($biodata->portofolio as $portfolio)
                <div class="col-lg-6 mb-4">
                    <div class="card h-100 shadow-sm portfolio-card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-start mb-3">
                                <h3 class="card-title h5 mb-0">{{ $portfolio->judul }}</h3>
                                <span class="badge bg-primary">{{ $portfolio->tahun }}</span>
                            </div>
                            <p class="card-text text-muted">{{ $portfolio->deskripsi }}</p>
                            
                            @if($portfolio->link)
                            <div class="mt-3">
                                <a href="{{ $portfolio->link }}" target="_blank" class="btn btn-outline-primary btn-sm">
                                    <i class="fab fa-github me-2"></i>Source Code
                                </a>
                                <button class="btn btn-outline-secondary btn-sm ms-2" data-bs-toggle="modal" data-bs-target="#portfolioModal{{ $portfolio->id }}">
                                    <i class="fas fa-info-circle me-2"></i>Detail
                                </button>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Modal untuk detail portofolio -->
                <div class="modal fade" id="portfolioModal{{ $portfolio->id }}" tabindex="-1">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">{{ $portfolio->judul }}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-8">
                                        <p><strong>Deskripsi:</strong></p>
                                        <p>{{ $portfolio->deskripsi }}</p>
                                        
                                        <p><strong>Tahun:</strong> {{ $portfolio->tahun }}</p>
                                        
                                        @if($portfolio->link)
                                        <p><strong>Link Proyek:</strong></p>
                                        <a href="{{ $portfolio->link }}" target="_blank" class="btn btn-primary">
                                            <i class="fab fa-github me-2"></i>Lihat di GitHub
                                        </a>
                                        @endif
                                    </div>
                                    <div class="col-md-4">
                                        <div class="tech-stack">
                                            <p><strong>Teknologi:</strong></p>
                                            <ul class="list-unstyled">
                                                @if($portfolio->id == 1)
                                                <li><span class="badge bg-light text-dark mb-1">Laravel</span></li>
                                                <li><span class="badge bg-light text-dark mb-1">MySQL</span></li>
                                                <li><span class="badge bg-light text-dark mb-1">Bootstrap</span></li>
                                                <li><span class="badge bg-light text-dark mb-1">Chart.js</span></li>
                                                @elseif($portfolio->id == 2)
                                                <li><span class="badge bg-light text-dark mb-1">HTML/CSS</span></li>
                                                <li><span class="badge bg-light text-dark mb-1">JavaScript</span></li>
                                                <li><span class="badge bg-light text-dark mb-1">PHP</span></li>
                                                <li><span class="badge bg-light text-dark mb-1">MySQL</span></li>
                                                @elseif($portfolio->id == 3)
                                                <li><span class="badge bg-light text-dark mb-1">CodeIgniter</span></li>
                                                <li><span class="badge bg-light text-dark mb-1">jQuery</span></li>
                                                <li><span class="badge bg-light text-dark mb-1">Bootstrap</span></li>
                                                @else
                                                <li><span class="badge bg-light text-dark mb-1">Laravel</span></li>
                                                <li><span class="badge bg-light text-dark mb-1">Vue.js</span></li>
                                                <li><span class="badge bg-light text-dark mb-1">MySQL</span></li>
                                                @endif
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            @if($biodata->portofolio->count() == 0)
            <div class="alert alert-info text-center">
                <i class="fas fa-info-circle me-2"></i>
                Data portofolio sedang dalam pengembangan.
            </div>
            @endif
        </div>
    </div>
</div>

<style>
.portfolio-card {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    border: none;
    border-left: 4px solid #007bff;
}

.portfolio-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 25px rgba(0,0,0,0.15);
}

.tech-stack .badge {
    font-size: 0.75em;
    padding: 5px 10px;
}
</style>
@endsection