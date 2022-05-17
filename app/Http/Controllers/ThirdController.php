<?php

namespace App\Http\Controllers;

use App\Models\Third;
use App\Http\Requests\StoreThirdRequest;
use App\Http\Requests\UpdateThirdRequest;

class ThirdController extends Controller
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
     * @param  \App\Http\Requests\StoreThirdRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreThirdRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Third  $third
     * @return \Illuminate\Http\Response
     */
    public function show(Third $third)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Third  $third
     * @return \Illuminate\Http\Response
     */
    public function edit(Third $third)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateThirdRequest  $request
     * @param  \App\Models\Third  $third
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateThirdRequest $request, Third $third)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Third  $third
     * @return \Illuminate\Http\Response
     */
    public function destroy(Third $third)
    {
        //
    }
}
