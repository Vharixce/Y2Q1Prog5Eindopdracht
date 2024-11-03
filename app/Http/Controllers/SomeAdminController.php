<?php


namespace App\Http\Controllers;

use App\Models\ClassType;
use Illuminate\Http\Request;

class SomeAdminController extends Controller
{

    public function index()
    {
        $classTypes = ClassType::all();
        return view('admin.dashboard', compact('classTypes'));
    }
}
