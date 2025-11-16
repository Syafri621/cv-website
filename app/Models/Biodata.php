<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Biodata extends Model
{
    use HasFactory;

    protected $table = 'biodata';
    
    protected $fillable = [
        'nama_lengkap', 'posisi', 'email', 'telepon', 
        'alamat', 'tentang_saya', 'foto'
    ];

    public function pendidikan()
    {
        return $this->hasMany(Pendidikan::class);
    }

    public function pengalaman()
    {
        return $this->hasMany(Pengalaman::class);
    }

    public function keahlian()
    {
        return $this->hasMany(Keahlian::class);
    }

    public function portofolio()
    {
        return $this->hasMany(Portofolio::class);
    }
}