<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Education;
use Illuminate\Http\Request;

class EducationController extends Controller
{

    public function index()
    {
        $education = Education::orderBy('year', 'desc')->get();
        return view('education', compact('education'));
    }
}
