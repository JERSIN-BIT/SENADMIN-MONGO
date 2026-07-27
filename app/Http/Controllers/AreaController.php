<?php

namespace App\Http\Controllers;

use App\Models\Area;
use Illuminate\Http\Request;

class AreaController extends Controller
{
    public function index()
{
    $areas = Area::all();

    return view('areas.index', compact('areas'));
}

    public function create()
    {
        return view('areas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        Area::create([
            'name' => $request->name
        ]);

        return redirect()->route('areas.index');
    }
}