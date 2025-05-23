<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
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
        $transaction = Transaction::create([
            'user_id' => $request->user_id,
            'amount' => $request->amount,
            'type' => $request->type,
            'teacher_id' => $request->teacher_id,
        ]);
        return $transaction;
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
        $transaction = Transaction::findOrFail($id);
        $transaction->update([
            'user_id' => $request->user_id,
            'amount' => $request->amount,
            'type' => $request->type,
            'teacher_id' => $request->teacher_id,
        ]);
        return $transaction;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $transaction = Transaction::findOrFail($id);
        $transaction->delete();
        return $transaction;
    }
}
