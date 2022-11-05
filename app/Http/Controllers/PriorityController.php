<?php

namespace App\Http\Controllers;

use App\Models\priority;
use Illuminate\Http\Request;

class PriorityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $priorities = priority::all();
        return view("priorities.index", [
            'priorities' => $priorities
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("priorities.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $priority = new Priority();
        $priority->name = $request->name;
        $priority->save();

        return redirect()->route('priorities.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\priority  $priority
     * @return \Illuminate\Http\Response
     */
    public function show(priority $priority)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\priority  $priority
     * @return \Illuminate\Http\Response
     */
    public function edit(priority $priority)
    {
        return view("priorities.edit", [
            "priority" => $priority
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\priority  $priority
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, priority $priority)
    {
        $priority->name = $request->name;
        $priority->save();
        return redirect()->route('priorities.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\priority  $priority
     * @return \Illuminate\Http\Response
     */
    public function destroy(priority $priority)
    {
        $priority->delete();
        return redirect()->route('priorities.index');
    }
}
