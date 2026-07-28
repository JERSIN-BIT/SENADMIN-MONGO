<?php

namespace App\Http\Controllers;

use App\Models\Apprentice;
use App\Models\Course;
use App\Models\Computer;
use Illuminate\Http\Request;

class ApprenticeController extends Controller
{
    public function index()
    {
        $apprentices = Apprentice::with(['course','computer'])->get();

        return view('apprentices.index', compact('apprentices'));
    }

    public function create()
    {
        $courses = Course::all();
        $computers = Computer::all();

        return view('apprentices.create', compact('courses','computers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'cell_number'=>'required',
            'course_id'=>'required',
            'computer_id'=>'required',
        ]);

        Apprentice::create($request->all());

        return redirect()->route('apprentices.index');
    }
}