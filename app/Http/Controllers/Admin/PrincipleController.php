<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Principle;
use Illuminate\Http\Request;

class PrincipleController extends Controller
{
    public function index()
    {
        $principles = Principle::ordered()->get();
        return view('admin.principles.index', compact('principles'));
    }

    public function create()
    {
        return view('admin.principles.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'number' => 'required|integer|min:1|max:10',
            'color' => 'required|string|in:blue,purple,pink,yellow,green,red',
            'order' => 'required|integer',
            'is_active' => 'boolean',
        ]);

        Principle::create($validated);

        return redirect()->route('admin.principles.index')->with('success', 'Principle created successfully');
    }

    public function edit(Principle $principle)
    {
        return view('admin.principles.edit', compact('principle'));
    }

    public function update(Request $request, Principle $principle)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'number' => 'required|integer|min:1|max:10',
            'color' => 'required|string|in:blue,purple,pink,yellow,green,red',
            'order' => 'required|integer',
            'is_active' => 'boolean',
        ]);

        $principle->update($validated);

        return redirect()->route('admin.principles.index')->with('success', 'Principle updated successfully');
    }

    public function destroy(Principle $principle)
    {
        $principle->delete();
        return redirect()->route('admin.principles.index')->with('success', 'Principle deleted successfully');
    }
}
