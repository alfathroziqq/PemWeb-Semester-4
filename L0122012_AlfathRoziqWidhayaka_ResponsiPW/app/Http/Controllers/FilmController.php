<?php

namespace App\Http\Controllers;

use App\Models\Film;
use Illuminate\Http\Request;

class FilmController extends Controller
{
    public function index()
    {
        $films = Film::all();
        return view('/film/listfilms', compact('films'));
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_film' => 'required|unique:films',
            'judul' => 'required',
            'sutradara' => 'required',
            'tahun_rilis' => 'required|numeric',
            'cover' => 'nullable|image|max:2048',
        ]);

        $film = new Film($request->all());

        if ($request->hasFile('cover')) {
            $filePath = $request->file('cover')->store('covers', 'public');
            $film->cover = '/storage/' . $filePath;
        }

        $film->save();

        return redirect()->route('films.index')->with('berhasil', 'Film sudah ditambahkan');
    }

    public function show(Film $film)
    {
        return view('show', compact('film'));
    }

    public function edit(Film $film)
    {
        return view('edit', compact('film'));
    }

    public function update(Request $request, Film $film)
    {
        $request->validate([
            'kode_film' => 'required|unique:films,kode_film,' . $film->id,
            'judul' => 'required',
            'sutradara' => 'required',
            'tahun_rilis' => 'required|numeric',
            'cover' => 'nullable|image|max:2048',
        ]);

        $film->fill($request->all());

        if ($request->hasFile('cover')) {
            $filePath = $request->file('cover')->store('covers', 'public');
            $film->cover = '/storage/' . $filePath;
        }

        $film->save();

        return redirect()->route('films.index')->with('success', 'Film updated successfully.');
    }

    public function destroy(Film $film)
    {
        $film->delete();

        return redirect()->route('films.index')->with('success', 'Film deleted successfully.');
    }
}
