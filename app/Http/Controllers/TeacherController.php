<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use App\Models\Area;
use App\Models\TrainingCenter;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function index()
    {
        $teachers = Teacher::with(['area', 'trainingCenter'])->get();

        return view('teachers.index', compact('teachers'));
    }

    public function create()
    {
        $areas = Area::all();
        $trainingCenters = TrainingCenter::all();

        return view('teachers.create', compact('areas','trainingCenters'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'area_id'=>'required',
            'training_center_id'=>'required',
        ]);

        Teacher::create($request->all());

        return redirect()->route('teachers.index');
    }
}