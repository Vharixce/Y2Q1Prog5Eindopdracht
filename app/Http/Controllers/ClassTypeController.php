<?php

namespace App\Http\Controllers;

use App\Models\ClassType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClassTypeController extends Controller
{
    // 1. List all class types (Read)
    public function index()
    {
        $classTypes = ClassType::with('user')->get();
        $userId = Auth::id();
        return view('classType.index', compact('classTypes', 'userId'));
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

        ClassType::create([
            'class' => $request->class,
            'ability' => $request->ability,
            'damage' => $request->damage,
            'cooldown' => $request->cooldown,
            'user_id' => auth()->id(),  // Set user ID
        ]);

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

    // 7. Filter and search class types
    public function filter(Request $request)
    {
        // Get filter and search inputs
        $classType = $request->input('class_type');
        $searchTerm = $request->input('search');

        // Query with both class filter and search term
        $query = ClassType::query();

        if ($classType) {
            $query->where('class', $classType);
        }

        if ($searchTerm) {
            $query->where(function ($q) use ($searchTerm) {
                $q->where('ability', 'LIKE', "%{$searchTerm}%")
                    ->orWhere('class', 'LIKE', "%{$searchTerm}%")
                    ->orWhere('cooldown', 'LIKE', "%{$searchTerm}%")
                    ->orWhere('damage', 'LIKE', "%{$searchTerm}%");
            });
        }

        // Retrieve results and pass to view
        $classTypes = $query->get();
        $userId = Auth::id();

        return view('classType.index', compact('classTypes', 'classType', 'searchTerm', 'userId'));
    }
}
