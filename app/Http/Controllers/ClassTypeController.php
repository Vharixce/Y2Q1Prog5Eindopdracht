<?php

namespace App\Http\Controllers;

use App\Models\ClassType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClassTypeController extends Controller
{
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
        $classType->active = !$classType->active;
        $classType->save();

        return redirect()->route('classTypes.index')->with('success', 'ClassType status updated successfully');
    }

    // Confirmation page view
    public function confirm()
    {
        return view('classType.confirm');
    }

    public function create()
    {
        if (!session()->has('confirmed')) {
            return redirect()->route('classTypes.confirm');
        }

        return view('classType.create');
    }

    public function store(Request $request)
    {
        // Check if the confirmation is in the session
        if (!session()->has('confirmed')) {
            return redirect()->route('classTypes.confirm')->with('error', 'Please confirm before creating an item.');
        }

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
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('classTypes.index')->with('success', 'ClassType created successfully');
    }


    // Process confirmation text input
    public function confirmPost(Request $request)
    {
        $request->validate([
            'confirmationText' => 'required|in:I am human and I love the game The Finals',
        ]);

        // Store confirmation in session
        session(['confirmed' => true]);

        return redirect()->route('classTypes.create')->with('success', 'Confirmation successful. You may now add items.');
    }

    public function edit(ClassType $classType)
    {
        return view('classType.edit', compact('classType'));
    }

    public function update(Request $request, ClassType $classType)
    {
        $request->validate([
            'class' => 'required',
            'ability' => 'required',
            'damage' => 'required|integer',
            'cooldown' => 'required',
        ]);

        $classType->update($request->all());

        return redirect()->route('classTypes.index')->with('success', 'ClassType updated successfully');
    }

    public function destroy(ClassType $classType)
    {
        $classType->delete();

        return redirect()->route('classTypes.index')->with('success', 'ClassType deleted successfully');
    }

    public function show(ClassType $classType)
    {
        return view('classType.show', compact('classType'));
    }

    // Filter and search class types
    public function filter(Request $request)
    {
        $classType = $request->input('class_type');
        $searchTerm = $request->input('search');

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

        // Only include active items for non-admin users
        if (!auth()->user() || !auth()->user()->isAdmin()) {
            $query->where('active', true);
        }

        $classTypes = $query->get();
        $userId = auth()->id();

        return view('classType.index', compact('classTypes', 'classType', 'searchTerm', 'userId'));
    }
}
