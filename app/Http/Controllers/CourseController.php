<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Course;
use App\Models\TrainingCenter;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index(Request $request)
    {
        $buscar = trim((string) $request->input('buscar', ''));

        $courses = Course::with(['area', 'trainingCenter'])
            ->when($buscar !== '', function ($query) use ($buscar) {
                $query->where(function ($subQuery) use ($buscar) {
                    $subQuery->where('course_number', 'like', '%' . $buscar . '%')->orWhere('day', 'like', '%' . $buscar . '%');
                });
            })
            ->orderBy('course_number')
            ->paginate(10)
            ->withQueryString();

        return view('courses.index', compact('courses', 'buscar'));
    }

    public function create()
    {
        $areas = Area::orderBy('name')->get();
        $trainingCenters = TrainingCenter::orderBy('name')->get();

        return view('courses.create', compact('areas', 'trainingCenters'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'course_number' => 'required|string|max:255',
            'day' => 'required|string|max:255',
            'area_id' => 'required|string',
            'training_center_id' => 'required|string',
        ]);

        Course::create([
            'course_number' => $request->course_number,
            'day' => $request->day,
            'area_id' => $request->area_id,
            'training_center_id' => $request->training_center_id,
        ]);

        return redirect()->route('courses.index')->with('success', 'Curso registrado correctamente.');
    }

    public function edit(string $id)
    {
        $course = Course::findOrFail($id);
        $areas = Area::orderBy('name')->get();
        $trainingCenters = TrainingCenter::orderBy('name')->get();

        return view('courses.edit', compact('course', 'areas', 'trainingCenters'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'course_number' => 'required|string|max:255',
            'day' => 'required|string|max:255',
            'area_id' => 'required|string',
            'training_center_id' => 'required|string',
        ]);

        $course = Course::findOrFail($id);

        $course->update([
            'course_number' => $request->course_number,
            'day' => $request->day,
            'area_id' => $request->area_id,
            'training_center_id' => $request->training_center_id,
        ]);

        return redirect()->route('courses.index')->with('success', 'Curso actualizado correctamente.');
    }

    public function destroy(string $id)
    {
        $course = Course::findOrFail($id);

        $course->delete();

        return redirect()->route('courses.index')->with('success', 'Curso eliminado correctamente.');
    }
}
