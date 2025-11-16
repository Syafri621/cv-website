<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Biodata;

class HomeController extends Controller
{
    public function index()
    {
        $biodata = Biodata::with(['pendidikan', 'pengalaman', 'keahlian', 'portofolio'])->first();
        
        if (!$biodata) {
            abort(404, 'Data biodata tidak ditemukan');
        }

        return view('home', compact('biodata'));
    }
}