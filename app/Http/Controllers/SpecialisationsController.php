<?php

namespace App\Http\Controllers;
use App\Models\Specialisation;
use Illuminate\Http\Request;

class SpecialisationsController extends Controller
{
    public function index()
    {
        // Haal alle specialisaties op uit de database
        $specialisations = Specialisation::all();

        // Stuur de data naar de view
        return view('specialisations.index', compact('specialisations'));
//        return view('specialisations.index');

    }
    public function create()
    {
        return view('specialisations.create');

    }
    public function details()
    {
        return view('specialisations.details');

    }
//    public function show(Specialisation $specialisation){
//        return view('specialisations.show', ['specialisation' => $specialisation]);
//    }

}
