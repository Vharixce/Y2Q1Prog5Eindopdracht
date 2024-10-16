<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SpecialisationsController extends Controller
{
    public function index()
    {

        return view('specialisations.index');
//        return view('specialisations.create');
//        return view('specialisations.details');

    }
    public function create()
    {

//        return view('specialisations.index');
        return view('specialisations.create');
//        return view('specialisations.details');

    }
    public function details()
    {

//        return view('specialisations.index');
//        return view('specialisations.create');
        return view('specialisations.details');

    }
}
