<?php

namespace App\Http\Controllers;

use App\Models\Area;
use Illuminate\Http\Request;

class AreaController extends Controller
{
    public function index(Request $request)
    {
        $buscar = $request->buscar;

        $areas = Area::when($buscar, function ($query) use ($buscar) {
            $query->where('name', 'like', '%' . $buscar . '%');
        })
            ->orderBy('name')
            ->paginate(10)
            ->withQueryString();

        return view('areas.index', compact('areas', 'buscar'));
    }

    public function create()
    {
        return view('areas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Area::create([
            'name' => $request->name,
        ]);

        return redirect()->route('areas.index')->with('success', 'Área registrada correctamente.');
    }

    public function show(string $id)
    {
        $area = Area::findOrFail($id);

        return view('areas.show', compact('area'));
    }

    public function edit(string $id)
    {
        $area = Area::findOrFail($id);

        return view('areas.edit', compact('area'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $area = Area::findOrFail($id);

        $area->update([
            'name' => $request->name,
        ]);

        return redirect()->route('areas.index')->with('success', 'Área actualizada correctamente.');
    }

    public function destroy(string $id)
    {
        $area = Area::findOrFail($id);

        $area->delete();

        return redirect()->route('areas.index')->with('success', 'Área eliminada correctamente.');
    }
}
