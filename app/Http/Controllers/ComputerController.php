<?php

namespace App\Http\Controllers;

use App\Models\Computer;
use Illuminate\Http\Request;

class ComputerController extends Controller
{
    public function index(Request $request)
    {
        $buscar = trim((string) $request->input('buscar', ''));

        $computers = Computer::when($buscar !== '', function ($query) use ($buscar) {
            $query->where(function ($subQuery) use ($buscar) {
                $subQuery->where('number', 'like', '%' . $buscar . '%')->orWhere('brand', 'like', '%' . $buscar . '%');
            });
        })
            ->orderBy('number')
            ->paginate(10)
            ->withQueryString();

        return view('computers.index', compact('computers', 'buscar'));
    }

    public function create()
    {
        return view('computers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'number' => 'required|string|max:255',
            'brand' => 'required|string|max:255',
        ]);

        Computer::create([
            'number' => $request->number,
            'brand' => $request->brand,
        ]);

        return redirect()->route('computers.index')->with('success', 'Computador registrado correctamente.');
    }

    public function edit(string $id)
    {
        $computer = Computer::findOrFail($id);

        return view('computers.edit', compact('computer'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'number' => 'required|string|max:255',
            'brand' => 'required|string|max:255',
        ]);

        $computer = Computer::findOrFail($id);

        $computer->update([
            'number' => $request->number,
            'brand' => $request->brand,
        ]);

        return redirect()->route('computers.index')->with('success', 'Computador actualizado correctamente.');
    }

    public function destroy(string $id)
    {
        $computer = Computer::findOrFail($id);

        $computer->delete();

        return redirect()->route('computers.index')->with('success', 'Computador eliminado correctamente.');
    }
}
