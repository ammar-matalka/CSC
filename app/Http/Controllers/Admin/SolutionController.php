<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Solution;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SolutionController extends Controller
{
    public function index()
    {
        $solutions = Solution::ordered()->get();
        return view('admin.solutions.index', compact('solutions'));
    }

    public function create()
    {
        return view('admin.solutions.create');
    }

    public function store(Request $request)
    {
      $validated = $request->validate([
    'title' => 'required|string|max:255',
    'description' => 'required|string',
    'features' => 'nullable|array',
    'features.*' => 'string',
    'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Required for new
    'icon' => 'nullable|string|max:255', // Optional
    'order' => 'required|integer',
    'is_active' => 'boolean',
]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('solutions', 'public');
        }

        Solution::create($validated);

        return redirect()->route('admin.solutions.index')->with('success', 'Solution created successfully');
    }

    public function edit(Solution $solution)
    {
        return view('admin.solutions.edit', compact('solution'));
    }

    public function update(Request $request, Solution $solution)
    {
        $validated = $request->validate([
    'title' => 'required|string|max:255',
    'description' => 'required|string',
    'features' => 'nullable|array',
    'features.*' => 'string',
    'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Optional for edit
    'icon' => 'nullable|string|max:255',
    'order' => 'required|integer',
    'is_active' => 'boolean',
]);

        if ($request->hasFile('image')) {
            if ($solution->image) {
                Storage::disk('public')->delete($solution->image);
            }
            $validated['image'] = $request->file('image')->store('solutions', 'public');
        }

        $solution->update($validated);

        return redirect()->route('admin.solutions.index')->with('success', 'Solution updated successfully');
    }

    public function destroy(Solution $solution)
    {
        if ($solution->image) {
            Storage::disk('public')->delete($solution->image);
        }
        $solution->delete();
        return redirect()->route('admin.solutions.index')->with('success', 'Solution deleted successfully');
    }
}
