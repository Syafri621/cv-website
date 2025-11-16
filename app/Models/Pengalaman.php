<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengalaman extends Model
{
    use HasFactory;

    protected $table = 'pengalaman';
    
    protected $fillable = [
        'biodata_id', 'jenis', 'posisi', 'perusahaan_organisasi',
        'tahun_mulai', 'tahun_selesai', 'deskripsi'
    ];

    public function biodata()
    {
        return $this->belongsTo(Biodata::class);
    }
}