<?php

namespace App\Http\Controllers;

use App\Models\Valutation;
use App\Http\Requests\StoreValutationRequest;
use App\Http\Requests\UpdateValutationRequest;

class ValutationController extends Controller
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
     * @param  \App\Http\Requests\StoreValutationRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreValutationRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Valutation  $valutation
     * @return \Illuminate\Http\Response
     */
    public function show(Valutation $valutation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Valutation  $valutation
     * @return \Illuminate\Http\Response
     */
    public function edit(Valutation $valutation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateValutationRequest  $request
     * @param  \App\Models\Valutation  $valutation
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateValutationRequest $request, Valutation $valutation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Valutation  $valutation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Valutation $valutation)
    {
        //
    }
}
