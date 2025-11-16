<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Biodata;

class CvController extends Controller
{
    public function pendidikan()
    {
        $biodata = Biodata::with(['pendidikan'])->first();
        return view('pendidikan', compact('biodata'));
    }

    public function pengalaman()
    {
        $biodata = Biodata::with(['pengalaman'])->first();
        return view('pengalaman', compact('biodata'));
    }

    public function keahlian()
    {
        $biodata = Biodata::with(['keahlian'])->first();
        return view('keahlian', compact('biodata'));
    }

    public function portofolio()
    {
        $biodata = Biodata::with(['portofolio'])->first();
        return view('portofolio', compact('biodata'));
    }

    // TAMBAH METHOD KONTAK
    public function kontak()
    {
        $biodata = Biodata::first();
        return view('kontak', compact('biodata'));
    }
}