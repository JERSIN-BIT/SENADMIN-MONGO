<?php

namespace App\Http\Controllers;

use App\Models\Apprentice;
use App\Models\Computer;
use App\Models\Course;
use Illuminate\Http\Request;

class ApprenticeController extends Controller
{
    public function index(Request $request)
    {
        $buscar = trim((string) $request->input('buscar', ''));

        $apprentices = Apprentice::with(['course', 'computer'])
            ->when($buscar !== '', function ($query) use ($buscar) {
                $query->where(function ($subQuery) use ($buscar) {
                    $subQuery
                        ->where('name', 'like', '%' . $buscar . '%')
                        ->orWhere('email', 'like', '%' . $buscar . '%')
                        ->orWhere('cell_number', 'like', '%' . $buscar . '%');
                });
            })
            ->orderBy('name')
            ->paginate(10)
            ->withQueryString();

        return view('apprentices.index', compact('apprentices', 'buscar'));
    }

    public function create()
    {
        $courses = Course::orderBy('course_number')->get();
        $computers = Computer::orderBy('number')->get();

        return view('apprentices.create', compact('courses', 'computers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'cell_number' => 'required|string|max:30',
            'course_id' => 'required|string',
            'computer_id' => 'required|string',
        ]);

        Apprentice::create([
            'name' => $request->name,
            'email' => $request->email,
            'cell_number' => $request->cell_number,
            'course_id' => $request->course_id,
            'computer_id' => $request->computer_id,
        ]);

        return redirect()->route('apprentices.index')->with('success', 'Aprendiz registrado correctamente.');
    }

    public function edit(string $id)
    {
        $apprentice = Apprentice::findOrFail($id);
        $courses = Course::orderBy('course_number')->get();
        $computers = Computer::orderBy('number')->get();

        return view('apprentices.edit', compact('apprentice', 'courses', 'computers'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'cell_number' => 'required|string|max:30',
            'course_id' => 'required|string',
            'computer_id' => 'required|string',
        ]);

        $apprentice = Apprentice::findOrFail($id);

        $apprentice->update([
            'name' => $request->name,
            'email' => $request->email,
            'cell_number' => $request->cell_number,
            'course_id' => $request->course_id,
            'computer_id' => $request->computer_id,
        ]);

        return redirect()->route('apprentices.index')->with('success', 'Aprendiz actualizado correctamente.');
    }

    public function destroy(string $id)
    {
        $apprentice = Apprentice::findOrFail($id);

        $apprentice->delete();

        return redirect()->route('apprentices.index')->with('success', 'Aprendiz eliminado correctamente.');
    }
}
