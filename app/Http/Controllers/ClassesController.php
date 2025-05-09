<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use Illuminate\Http\Request;

class ClassesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
          'majors_id'=>'required|exists:majors,id',
          'class'=>'required',
          'grade'=>'required',
        ]);

        $class = Classes::create([
            'majors_id' => $request['majors_id'],
            'class' => $request['class'],
            'grade'=> $request['grade'],
            'teacher_id' => $request['teacher_id'],
        ]);
        // $class->students()->attach($validated['students']);

        return $class;

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $validated = $request->validate([
            'majors_id'=>'required|exists:majors,id',
            'class'=>'required',
            'grade'=>'required',
        ]);

        $class = Classes::findOrFail($id);

        $class->update([
            'majors_id' => $request['majors_id'],
            'class' => $request['class'],
            'grade'=> $request['grade'],
            'teacher_id' => $request['teacher_id'],
        ]);
        // $class->students()->sync($validated['students']);
        $class->save();
        return $class;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $class = Classes::findOrFail($id);
        $class->students()->detach();
        $class->delete();
        return $class;
    }
}
