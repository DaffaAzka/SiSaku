<?php

namespace App\Http\Controllers;

use App\Models\Log;
use Illuminate\Http\Request;

class LogController extends Controller
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
        $valited = $request->validate([
            'user_id' => 'required|exists:users,id',
            'action' => 'required',
            'description' => 'required',
        ]);
        $Log = Log::create([
            'user_id' => $valited['user_id'],
            'action' => $valited['action'],
            'description' => $valited['description'],
        ]);


        return $Log;

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
        $valited = $request->validate([
            'user_id' => 'required|exists:users,id',
            'action' => 'required',
            'description' => 'required',
        ]);
        $Log = Log::find($id);
        $Log->user_id = $valited['user_id'];
        $Log->action = $valited['action'];
        $Log->description = $valited['description'];
        $Log->save();
        return $Log;

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $Log = Log::find($id);
        $Log->delete();
        return $Log;
    }
}
