<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SpecialisationsController extends Controller
{
    public function showSpecialisationsView()
    {
        return view('specialisations');
    }
}
