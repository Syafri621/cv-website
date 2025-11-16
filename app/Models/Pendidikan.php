<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendidikan extends Model
{
    use HasFactory;

    protected $table = 'pendidikan';
    
    protected $fillable = [
        'biodata_id', 'institusi', 'jurusan', 
        'tahun_mulai', 'tahun_selesai', 'deskripsi'
    ];

    public function biodata()
    {
        return $this->belongsTo(Biodata::class);
    }
}