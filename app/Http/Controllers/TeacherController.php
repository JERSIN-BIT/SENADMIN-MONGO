<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Teacher;
use App\Models\TrainingCenter;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function index(Request $request)
    {
        $buscar = trim((string) $request->input('buscar', ''));

        $teachers = Teacher::with(['area', 'trainingCenter'])
            ->when($buscar !== '', function ($query) use ($buscar) {
                $query->where(function ($subQuery) use ($buscar) {
                    $subQuery->where('name', 'like', '%' . $buscar . '%')->orWhere('email', 'like', '%' . $buscar . '%');
                });
            })
            ->orderBy('name')
            ->paginate(10)
            ->withQueryString();

        return view('teachers.index', compact('teachers', 'buscar'));
    }

    public function create()
    {
        $areas = Area::orderBy('name')->get();
        $trainingCenters = TrainingCenter::orderBy('name')->get();

        return view('teachers.create', compact('areas', 'trainingCenters'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'area_id' => 'required|string',
            'training_center_id' => 'required|string',
        ]);

        Teacher::create([
            'name' => $request->name,
            'email' => $request->email,
            'area_id' => $request->area_id,
            'training_center_id' => $request->training_center_id,
        ]);

        return redirect()->route('teachers.index')->with('success', 'Instructor registrado correctamente.');
    }

    public function edit(string $id)
    {
        $teacher = Teacher::findOrFail($id);
        $areas = Area::orderBy('name')->get();
        $trainingCenters = TrainingCenter::orderBy('name')->get();

        return view('teachers.edit', compact('teacher', 'areas', 'trainingCenters'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'area_id' => 'required|string',
            'training_center_id' => 'required|string',
        ]);

        $teacher = Teacher::findOrFail($id);

        $teacher->update([
            'name' => $request->name,
            'email' => $request->email,
            'area_id' => $request->area_id,
            'training_center_id' => $request->training_center_id,
        ]);

        return redirect()->route('teachers.index')->with('success', 'Instructor actualizado correctamente.');
    }

    public function destroy(string $id)
    {
        $teacher = Teacher::findOrFail($id);

        $teacher->delete();

        return redirect()->route('teachers.index')->with('success', 'Instructor eliminado correctamente.');
    }
}
