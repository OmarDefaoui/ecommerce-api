<?php

namespace App\Http\Controllers;

use App\Http\Resources\GlobalCategoryResource;
use App\Models\GlobalCategory;
use Illuminate\Http\Request;

class GlobalCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return GlobalCategoryResource::collection(GlobalCategory::all());
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\GlobalCategory  $globalCategory
     * @return \Illuminate\Http\Response
     */
    public function show(GlobalCategory $globalCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\GlobalCategory  $globalCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(GlobalCategory $globalCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\GlobalCategory  $globalCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GlobalCategory $globalCategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\GlobalCategory  $globalCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(GlobalCategory $globalCategory)
    {
        //
    }
}
