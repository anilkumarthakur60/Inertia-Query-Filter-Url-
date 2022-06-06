<?php

namespace App\Http\Controllers;

use App\Models\First;
use App\Http\Requests\StoreFirstRequest;
use App\Http\Requests\UpdateFirstRequest;

class FirstController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreFirstRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFirstRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\First  $first
     * @return \Illuminate\Http\Response
     */
    public function show(First $first)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\First  $first
     * @return \Illuminate\Http\Response
     */
    public function edit(First $first)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateFirstRequest  $request
     * @param  \App\Models\First  $first
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFirstRequest $request, First $first)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\First  $first
     * @return \Illuminate\Http\Response
     */
    public function destroy(First $first)
    {
        //
    }
}
