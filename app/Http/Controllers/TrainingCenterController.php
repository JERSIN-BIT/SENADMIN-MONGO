<?php

namespace App\Http\Controllers;

use App\Models\TrainingCenter;
use Illuminate\Http\Request;

class TrainingCenterController extends Controller
{
    public function index(Request $request)
    {
        $buscar = $request->buscar;

        $trainingCenters = TrainingCenter::when($buscar, function ($query) use ($buscar) {
            $query->where('name', 'like', '%' . $buscar . '%');
        })
            ->orderBy('name')
            ->paginate(10)
            ->withQueryString();

        return view('training_centers.index', compact('trainingCenters', 'buscar'));
    }

    public function create()
    {
        return view('training_centers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
        ]);

        TrainingCenter::create([
            'name' => $request->name,
            'address' => $request->address,
        ]);

        return redirect()->route('training-centers.index')->with('success', 'Centro de formación registrado correctamente.');
    }

    public function show(string $id)
    {
        $trainingCenter = TrainingCenter::findOrFail($id);

        return view('training_centers.show', compact('trainingCenter'));
    }

    public function edit(string $id)
    {
        $trainingCenter = TrainingCenter::findOrFail($id);

        return view('training_centers.edit', compact('trainingCenter'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
        ]);

        $trainingCenter = TrainingCenter::findOrFail($id);

        $trainingCenter->update([
            'name' => $request->name,
            'address' => $request->address,
        ]);

        return redirect()->route('training-centers.index')->with('success', 'Centro de formación actualizado correctamente.');
    }

    public function destroy(string $id)
    {
        $trainingCenter = TrainingCenter::findOrFail($id);

        $trainingCenter->delete();

        return redirect()->route('training-centers.index')->with('success', 'Centro de formación eliminado correctamente.');
    }
}
