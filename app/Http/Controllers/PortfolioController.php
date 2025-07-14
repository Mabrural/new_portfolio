<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PortfolioController extends Controller
{
    public function index()
    {
        $portfolios = Portfolio::orderBy('id', 'desc')->get();
        return view('portfolios.index', compact('portfolios'));
    }

    public function create()
    {
        return view('portfolios.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'technologies' => 'nullable|string',
            'link' => 'nullable|url',
            'image1' => 'nullable|image|max:2048',
            'image2' => 'nullable|image|max:2048',
            'image3' => 'nullable|image|max:2048',
            'image4' => 'nullable|image|max:2048',
            'image5' => 'nullable|image|max:2048',
        ]);

        $portfolio = new Portfolio();
        $portfolio->title = $validated['title'];
        $portfolio->description = $validated['description'] ?? null;
        $portfolio->technologies = $validated['technologies'] ?? null;
        $portfolio->link = $validated['link'] ?? null;

        // handle each image
        for ($i = 1; $i <= 5; $i++) {
            $file = $request->file('image' . $i);
            if ($file) {
                $path = $file->store('portfolios', 'public');
                $portfolio->{'image' . $i} = $path;
            }
        }

        $portfolio->save();

        return redirect()->route('portfolio.index')->with('success', 'Portfolio created successfully.');
    }


    public function edit(Portfolio $portfolio)
    {
        return view('portfolios.edit', compact('portfolio'));
    }

    public function update(Request $request, Portfolio $portfolio)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'technologies' => 'nullable|string',
            'link' => 'nullable|url',
            'image1' => 'nullable|image|max:2048',
            'image2' => 'nullable|image|max:2048',
            'image3' => 'nullable|image|max:2048',
            'image4' => 'nullable|image|max:2048',
            'image5' => 'nullable|image|max:2048',
        ]);

        $portfolio->title = $validated['title'];
        $portfolio->description = $validated['description'] ?? null;
        $portfolio->technologies = $validated['technologies'] ?? null;
        $portfolio->link = $validated['link'] ?? null;

        // handle each image
        for ($i = 1; $i <= 5; $i++) {
            $field = 'image' . $i;

            if ($request->hasFile($field)) {
                // Hapus file lama jika ada
                if ($portfolio->$field && Storage::disk('public')->exists($portfolio->$field)) {
                    Storage::disk('public')->delete($portfolio->$field);
                }

                // Simpan file baru
                $path = $request->file($field)->store('portfolios', 'public');
                $portfolio->$field = $path;
            }
        }

        $portfolio->save();

        return redirect()->route('portfolio.index')->with('success', 'Portfolio updated successfully.');
    }

    public function destroy(Portfolio $portfolio)
    {
        $images = [
            $portfolio->image1,
            $portfolio->image2,
            $portfolio->image3,
            $portfolio->image4,
            $portfolio->image5,
        ];

        foreach ($images as $path) {
            if ($path && Storage::disk('public')->exists($path)) {
                Storage::disk('public')->delete($path);
            }
        }

        $portfolio->delete();

        return redirect()->route('portfolio.index')->with('success', 'Portfolio deleted successfully.');
    }
}
