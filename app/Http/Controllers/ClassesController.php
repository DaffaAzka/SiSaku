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
        //
        $validated = $request->validate([
          'majors'=>'requaired /exists:majors,id',
          'class'=>'requaired /exists:classes,id',
          'teacher_id'=>'requaired /exists:users,id',
        ]);
        $class = Classes::create([
            'majors' => $validated['majors'],
            'class' => $validated['class'],
            'teacher_id' => $validated['teacher_id'],
        ]);
        $class->students()->attach($validated['students']);
        return response()->json([
            'message' => 'Class berhasil ditambahkan',
            'data' => $class,
        ])->setStatusCode(201);

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
        //
        $validated = $request->validate([
            'majors'=>'requaired /exists:majors,id',
            'class'=>'requaired /exists:classes,id',
            'teacher_id'=>'requaired /exists:users,id',
        ]);
        $class = Classes::findorfail($id);
        $class->majors = $validated['majors'];
        $class->class = $validated['class'];
        $class->teacher_id = $validated['teacher_id'];
        $class->students()->sync($validated['students']);
        $class->save();
        return response()->json([
            'message' => 'class berhasil diupdate',
            'data' => $class,
        ])->setStatusCode(200,);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $class = Classes::findorfail($id);
        $class->students()->detach();
        $class->delete();
        return response()->json([
            'message' => 'berhasil dihapus',
            'data' => $class,
        ])->setStatuscode(200,);

    }
}
