<?php

namespace App\Http\Controllers;

use App\Models\Scholarship;
use Illuminate\Http\Request;

class ScholarshipController extends Controller
{
    public function index()
    {
        $scholarships = Scholarship::all();
        return view('backend.scholarships.index', compact('scholarships'));
    }

    public function create()
    {
        return view('backend.scholarships.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'image' => 'nullable|image|max:2048',
            'content' => 'required',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('scholarships');
        }

        Scholarship::create($data);
        return redirect()->route('scholarships.index')->with('success', 'Scholarship created successfully.');
    }

    public function show(Scholarship $scholarship)
    {
        return view('backend.scholarships.show', compact('scholarship'));
    }

    public function edit(Scholarship $scholarship)
    {
        return view('backend.scholarships.edit', compact('scholarship'));
    }

    public function update(Request $request, Scholarship $scholarship)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'image' => 'nullable|image|max:2048',
            'content' => 'required',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('scholarships');
        }

        $scholarship->update($data);
        return redirect()->route('scholarships.index')->with('success', 'Scholarship updated successfully.');
    }

    public function destroy(Scholarship $scholarship)
    {
        $scholarship->delete();
        return redirect()->route('scholarships.index')->with('success', 'Scholarship deleted successfully.');
    }
}
