<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    public function index($id = null) {  // Accepting $id as a parameter
        $company = 'Hogeschool Rotterdam';

        return view('about-us', [
            'id' => $id // Passing the $id to the view
        ]);
    }
}
