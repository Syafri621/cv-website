@extends('app')

@section('title', 'Pendidikan - CV ' . $biodata->nama_lengkap)

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-12">
            <h1 class="mb-4">Riwayat Pendidikan</h1>
            
            @foreach($biodata->pendidikan as $edu)
            <div class="card mb-4">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <h3 class="card-title">{{ $edu->institusi }}</h3>
                            <h5 class="card-subtitle text-muted mb-2">{{ $edu->jurusan }}</h5>
                            <p class="card-text">{{ $edu->deskripsi }}</p>
                        </div>
                        <div class="col-md-4 text-md-end">
                            <span class="badge bg-primary fs-6">
                                {{ $edu->tahun_mulai }} - {{ $edu->tahun_selesai }}
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