<?php

namespace App\Http\Controllers;

use App\Models\ClassType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClassTypeController extends Controller
{
    // 1. List all class types (Read)
//    public function __construct()
//    {
//        $this->middleware('auth')->only(['create', 'store']);
//    }


    public function index()
    {
        $userId = auth()->id();

        if (auth()->user() && auth()->user()->isAdmin()) {
            // Admins see all items, both active and inactive
            $classTypes = ClassType::with('user')->get();
        } else {
            // Non-admin users only see active items
            $classTypes = ClassType::with('user')->where('active', true)->get();
        }

        return view('classType.index', compact('classTypes', 'userId'));
    }


    public function toggleActive(ClassType $classType)
    {
        $classType->active = !$classType->active; // Toggle the active status
        $classType->save();

        return redirect()->route('classTypes.index')->with('success', 'ClassType status updated successfully');
    }

//    public function index()
//    {
//        $classTypes = ClassType::with('user')->get();
//        $userId = Auth::id();
//        return view('classType.index', compact('classTypes', 'userId'));
//    }

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
        $classType = $request->input('class_type');
        $searchTerm = $request->input('search');

        // Start a new query
        $query = ClassType::query();

        // Apply class type filter if provided
        if ($classType) {
            $query->where('class', $classType);
        }

        // Apply search filter if provided
        if ($searchTerm) {
            $query->where(function ($q) use ($searchTerm) {
                $q->where('ability', 'LIKE', "%{$searchTerm}%")
                    ->orWhere('class', 'LIKE', "%{$searchTerm}%")
                    ->orWhere('cooldown', 'LIKE', "%{$searchTerm}%")
                    ->orWhere('damage', 'LIKE', "%{$searchTerm}%");
            });
        }

        // Only include active items for non-admin users
        if (!auth()->user() || !auth()->user()->isAdmin()) {
            $query->where('active', true);
        }

        $classTypes = $query->get();
        $userId = auth()->id();

        return view('classType.index', compact('classTypes', 'classType', 'searchTerm', 'userId'));
    }

}
