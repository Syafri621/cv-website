<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keahlian extends Model
{
    use HasFactory;

    protected $table = 'keahlian';
    
    protected $fillable = [
        'biodata_id', 'nama_keahlian', 'tingkat', 'kategori'
    ];

    public function biodata()
    {
        return $this->belongsTo(Biodata::class);
    }
}