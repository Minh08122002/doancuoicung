<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\itemtype;
use App\Models\post;
use Carbon\Carbon;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    }
    public function addpost()
    {
        $itemType = ItemType::all();
        $uniqueItemType = ItemType::pluck('name', 'id')->unique('name');;
        $uniqueItemType = ItemType::with('children')->get();
        return view('quantrivien.bai-dang.add_post',['uniqueItemType'=>$uniqueItemType]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        /**
         * lưu
         */
        $post = new post();
        $post->created_by = Auth::id();
        $post->title = $request->input('title');
        $post->item_type_id=$request->input('item_type_id');
        $post->content=$request->input('content');
        $post->status=$request->input('status');
        $post->save();
        return redirect()->back();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
