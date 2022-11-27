<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLegalCaseRequest;
use App\Http\Requests\UpdateLegalCaseRequest;
use App\Models\UD\LegalCase;

class LegalCaseController extends Controller
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
     * @param  \App\Http\Requests\StoreLegalCaseRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLegalCaseRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UD\LegalCase  $legalCase
     * @return \Illuminate\Http\Response
     */
    public function show(LegalCase $legalCase)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UD\LegalCase  $legalCase
     * @return \Illuminate\Http\Response
     */
    public function edit(LegalCase $legalCase)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateLegalCaseRequest  $request
     * @param  \App\Models\UD\LegalCase  $legalCase
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLegalCaseRequest $request, LegalCase $legalCase)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UD\LegalCase  $legalCase
     * @return \Illuminate\Http\Response
     */
    public function destroy(LegalCase $legalCase)
    {
        //
    }
}
