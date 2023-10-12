<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\tag;
use Illuminate\Http\Request;

class TagController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return tag::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return tag::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return tag::find($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $tag = tag::findOrFail($id);
        $tag->update($request->all());

        return $tag;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tag = tag::find($id);
        $tag->delete();

    }
}
