<?php

namespace App\Http\Controllers;

use App\Models\Hero;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HeroController extends Controller
{
    /**
     * Display a listing of the heroes.
     */
    public function index()
    {
        $hero = Hero::first();
        return view('heroes.index', compact('hero'));
    }


    /**
     * Show the form for creating a new hero.
     */
    public function create()
    {
        $hero = Hero::first();

        if ($hero) {
            return redirect()->route('heroes.edit', $hero)->with('info', 'Hero already exists, you can only edit.');
        }

        return view('heroes.create');
    }


    /**
     * Store a newly created hero in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'subname' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('heroes', 'public');
        }

        Hero::create($validated);

        return redirect()->route('heroes.index')->with('success', 'Hero created successfully.');
    }

    /**
     * Display the specified hero.
     */
    public function show(Hero $hero)
    {
        return view('heroes.show', compact('hero'));
    }

    /**
     * Show the form for editing the specified hero.
     */
    public function edit(Hero $hero)
    {
        return view('heroes.edit', compact('hero'));
    }

    /**
     * Update the specified hero in storage.
     */
    public function update(Request $request, Hero $hero)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'subname' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            // hapus file lama kalau ada
            if ($hero->image && Storage::disk('public')->exists($hero->image)) {
                Storage::disk('public')->delete($hero->image);
            }

            $validated['image'] = $request->file('image')->store('heroes', 'public');
        }

        $hero->update($validated);

        return redirect()->route('heroes.index')->with('success', 'Hero updated successfully.');
    }

    /**
     * Remove the specified hero from storage.
     */
    public function destroy(Hero $hero)
    {
        // hapus file gambar kalau ada
        if ($hero->image && Storage::disk('public')->exists($hero->image)) {
            Storage::disk('public')->delete($hero->image);
        }

        $hero->delete();

        return redirect()->route('heroes.index')->with('success', 'Hero deleted successfully.');
    }
}
