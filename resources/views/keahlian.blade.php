@extends('app')

@section('title', 'Keahlian - CV ' . $biodata->nama_lengkap)

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-12">
            <h1 class="mb-4">Keahlian</h1>
            
            @php
                $kategori = $biodata->keahlian->unique('kategori');
            @endphp
            
            @foreach($kategori as $kat)
            <div class="mb-5">
                <h3 class="border-bottom pb-2 mb-4">{{ $kat->kategori }}</h3>
                <div class="row">
                    @foreach($biodata->keahlian->where('kategori', $kat->kategori) as $skill)
                    <div class="col-md-6 mb-3">
                        <div class="card h-100">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h5 class="card-title mb-0">{{ $skill->nama_keahlian }}</h5>
                                    <span class="badge bg-{{ 
                                        $skill->tingkat == 'ahli' ? 'success' : 
                                        ($skill->tingkat == 'mahir' ? 'primary' : 
                                        ($skill->tingkat == 'menengah' ? 'warning' : 'secondary')) 
                                    }}">
                                        {{ ucfirst($skill->tingkat) }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection