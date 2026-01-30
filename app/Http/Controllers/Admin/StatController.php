<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Stat;
use Illuminate\Http\Request;

class StatController extends Controller
{
    public function index()
    {
        $stats = Stat::ordered()->get();
        return view('admin.stats.index', compact('stats'));
    }

    public function create()
    {
        return view('admin.stats.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'number' => 'required|string|max:50',
            'description' => 'nullable|string',
            'color' => 'required|string|in:blue,purple,pink,green,yellow,red',
            'order' => 'required|integer',
            'is_active' => 'boolean',
        ]);

        Stat::create($validated);

        return redirect()->route('admin.stats.index')->with('success', 'Stat created successfully');
    }

    public function edit(Stat $stat)
    {
        return view('admin.stats.edit', compact('stat'));
    }

    public function update(Request $request, Stat $stat)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'number' => 'required|string|max:50',
            'description' => 'nullable|string',
            'color' => 'required|string|in:blue,purple,pink,green,yellow,red',
            'order' => 'required|integer',
            'is_active' => 'boolean',
        ]);

        $stat->update($validated);

        return redirect()->route('admin.stats.index')->with('success', 'Stat updated successfully');
    }

    public function destroy(Stat $stat)
    {
        $stat->delete();
        return redirect()->route('admin.stats.index')->with('success', 'Stat deleted successfully');
    }
}
