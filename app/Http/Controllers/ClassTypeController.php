<?php

namespace App\Http\Controllers;

use App\Models\ClassType;
use Illuminate\Http\Request;

class ClassTypeController extends Controller
{
    // 1. List all class types (Read)
    public function index()
    {
        $classTypes = ClassType::all();
        return view('classType.index', compact('classTypes'));
    }

    // 2. Show create form (Create)
    public function create()
    {
        return view('classType.create');
    }

    // 3. Store the new class type (Create)
    public function store(Request $request)
    {
        $request->validate([
            'class' => 'required',
            'ability' => 'required',
            'damage' => 'required|integer',
            'cooldown' => 'required'
        ]);

        ClassType::create($request->all());
        return redirect()->route('classTypes.index')->with('success', 'ClassType created successfully');
    }

    // 4. Show the form to edit the class type (Update)
    public function edit(ClassType $classType)
    {
        return view('classType.edit', compact('classType'));
    }

    // 5. Update the class type (Update)
    public function update(Request $request, ClassType $classType)
    {
        $request->validate([
            'class' => 'required',
            'ability' => 'required',
            'damage' => 'required|integer',
            'cooldown' => 'required'
        ]);

        $classType->update($request->all());
        return redirect()->route('classTypes.index')->with('success', 'ClassType updated successfully');
    }

    // 6. Delete a class type (Delete)
    public function destroy(ClassType $classType)
    {
        $classType->delete();
        return redirect()->route('classTypes.index')->with('success', 'ClassType deleted successfully');
    }

    public function show(ClassType $classType)
    {
        return view('classType.show', compact('classType'));
    }







//searching methodes
    public function filter(Request $request)
    {
        // Get the class type to filter by
        $classType = $request->input('class_type');

        // Fetch items based on the filter, or all items if no filter is applied
        $classTypes = $classType ? ClassType::where('class', $classType)->get() : ClassType::all();

        return view('classType.index', compact('classTypes', 'classType'));
    }

}
