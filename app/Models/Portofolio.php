<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portofolio extends Model
{
    use HasFactory;

    protected $table = 'portofolio';
    
    protected $fillable = [
        'biodata_id', 'judul', 'deskripsi', 'link', 'gambar', 'tahun'
    ];

    public function biodata()
    {
        return $this->belongsTo(Biodata::class);
    }
}