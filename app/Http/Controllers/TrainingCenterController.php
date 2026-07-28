<?php

namespace App\Http\Controllers;

use App\Models\TrainingCenter;
use Illuminate\Http\Request;

class TrainingCenterController extends Controller
{
    public function index()
    {
        $trainingCenters = TrainingCenter::all();

        return view('training_centers.index', compact('trainingCenters'));
    }

    public function create()
    {
        return view('training_centers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'location' => 'required'
        ]);

        TrainingCenter::create([
            'name' => $request->name,
            'location' => $request->location
        ]);

        return redirect()->route('training-centers.index');
    }
}