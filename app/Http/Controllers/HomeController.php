<?php

namespace App\Http\Controllers;

use Database\Seeders\SpecialisationSeeder;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function showHomeView()
    {
        return view('home');
    }
}
