<?php

namespace App\Http\Controllers;

use App\Models\ClassStudent;
use Illuminate\Http\Request;

class ClassStudentController extends Controller
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
        $request->validate([
            'class_id' => 'required|exists:classes,id',
            'student_id' => 'required|exists:users,id',
        ]);
        $classStudent = ClassStudent::create([
            'class_id' => $request->class_id,
            'student_id' => $request->student_id,
        ]);
        return $classStudent;
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
        $request->validate([
            'class_id' => 'required|exists:classes,id',
            'student_id' => 'required|exists:users,id',
        ]);
        $classStudent = ClassStudent::findOrFail($id);
        $classStudent->update([
            'class_id' => $request->class_id,
            'student_id' => $request->student_id,
        ]);
        return $classStudent;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $classStudent = ClassStudent::findOrFail($id);
        $classStudent->delete();
        return $classStudent;
    }
}
