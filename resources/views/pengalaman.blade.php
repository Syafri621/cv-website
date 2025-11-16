@extends('app')

@section('title', 'Pengalaman - CV ' . $biodata->nama_lengkap)

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-12">
            <h1 class="mb-4">Pengalaman</h1>
            
            @foreach($biodata->pengalaman as $exp)
            <div class="card mb-4">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <h3 class="card-title">{{ $exp->posisi }}</h3>
                            <h5 class="card-subtitle text-muted mb-2">{{ $exp->perusahaan_organisasi }}</h5>
                            <p class="card-text">{{ $exp->deskripsi }}</p>
                        </div>
                        <div class="col-md-4 text-md-end">
                            <span class="badge bg-{{ 
                                $exp->jenis == 'pekerjaan' ? 'success' : 
                                ($exp->jenis == 'organisasi' ? 'info' : 
                                ($exp->jenis == 'magang' ? 'warning' : 'secondary')) 
                            }} mb-2">
                                {{ ucfirst($exp->jenis) }}
                            </span>
                            <br>
                            <span class="text-muted">
                                {{ $exp->tahun_mulai }} - {{ $exp->tahun_selesai }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection