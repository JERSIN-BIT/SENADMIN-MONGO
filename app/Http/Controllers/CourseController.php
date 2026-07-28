<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Area;
use App\Models\TrainingCenter;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::with(['area','trainingCenter'])->get();

        return view('courses.index', compact('courses'));
    }

    public function create()
    {
        $areas = Area::all();
        $trainingCenters = TrainingCenter::all();

        return view('courses.create', compact('areas','trainingCenters'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'course_number'=>'required',
            'day'=>'required',
            'area_id'=>'required',
            'training_center_id'=>'required',
        ]);

        Course::create($request->all());

        return redirect()->route('courses.index');
    }
}