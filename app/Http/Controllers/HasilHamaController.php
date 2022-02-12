<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HasilHamaController extends Controller
{
    public function index()
    {
        return view('diagnosahama.hasil');
    }
}
