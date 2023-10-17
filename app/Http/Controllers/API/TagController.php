<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\tag;
use Illuminate\Http\Request;
use App\Http\Resources\Tag as TagResource;
use Illuminate\Support\Facades\Response ;

class TagController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $limit = $request->input('limit') <=50 ? $request->input('limit') : 15;
        $tag =  TagResource::collection(tag::paginate($limit ?? 10));
        return  Response([
            'data' => [
                'message' => 'Tags Return SuccessFully'
            ]
        ] , 200);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $tag =  new TagResource(tag::create($request->all()));
        return  Response([
            'data' => [
                'message' => 'Tag Create SuccessFully'
            ]
        ] , 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $tag =  new TagResource(tag::find($id));
        return  Response([
            'data' => [
                'message' => 'Tag Return SuccessFully'
            ]
        ] , 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $tag_id = tag::findOrFail($id);;
        $this->authorize('update' , $tag_id);
        $tag =  new TagResource(tag::find($id)->update($request->all()));
        return  Response([
            'data' => [
                'message' => 'Tags Update Success'
            ]
        ] , 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tag_id = tag::findOrFail($id);;
        $this->authorize('delete' , $tag_id);
        $tag =  new TagResource(tag::find($id)->delete());
        return  Response([
            'data' => [
                'message' => 'tag Delete SuccessFully'
            ]
        ] , 200);
    }
}
