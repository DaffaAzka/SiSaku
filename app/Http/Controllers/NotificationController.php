<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
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
            'user_id' => 'required|integer',
            'message' => 'required|string',
            'is_read' => 'required|boolean',
        ]);

        Notification::create([
            'user_id' => $request->user_id,
            'message' => $request->title,
            'is_read' => $request->is_read,
        ]);
        return back();
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
            'user_id' => 'required|integer',
            'message' => 'required|string',
            'is_read' => 'required|boolean',
        ]);
        $notification = Notification::findorFail($id)->update($request->only('user_id', 'message', 'is_read'));
        return $notification;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $notification = Notification::findOrFail($id)->delete();
        return $notification;
    }
}
