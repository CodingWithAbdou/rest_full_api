<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\tag;
use Illuminate\Http\Request;

use App\Http\Resources\Tag as TagResource;

class TagController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tag =  TagResource::collection(tag::all());
        return $tag->response()->setStatusCode(200 , "Tags Return SuccessFully");
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $tag =  new TagResource(tag::create($request->all()));
        return $tag->response()->setStatusCode(200 , "Tag Create SuccessFully");

        return ;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $tag =  new TagResource(tag::find($id));
        return $tag->response()->setStatusCode(200 , "Tag Return SuccessFully");
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $tag =  new TagResource(tag::find($id)->update($request->all()));
        return $tag->response()->setStatusCode(200 , "Tags Update Success");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tag =  new TagResource(tag::find($id)->delete());
        return $tag->response()->setStatusCode(200 , "tag Delete SuccessFully");
    }
}
