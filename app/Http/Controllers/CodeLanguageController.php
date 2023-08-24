<?php

namespace App\Http\Controllers;

use App\Models\code_language;
use App\Http\Requests\Storecode_languageRequest;
use App\Http\Requests\Updatecode_languageRequest;

class CodeLanguageController extends Controller
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
     * @param  \App\Http\Requests\Storecode_languageRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storecode_languageRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\code_language  $code_language
     * @return \Illuminate\Http\Response
     */
    public function show(code_language $code_language)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\code_language  $code_language
     * @return \Illuminate\Http\Response
     */
    public function edit(code_language $code_language)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updatecode_languageRequest  $request
     * @param  \App\Models\code_language  $code_language
     * @return \Illuminate\Http\Response
     */
    public function update(Updatecode_languageRequest $request, code_language $code_language)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\code_language  $code_language
     * @return \Illuminate\Http\Response
     */
    public function destroy(code_language $code_language)
    {
        //
    }
}
