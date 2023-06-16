<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\itemtype;
use App\Models\Subcategory;
use Illuminate\Validation\Rule;

class SubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     */
    public function showadd()
    {
        $itemType = ItemType::all();
        $uniqueItemType = $itemType->unique('name');
        return view('quantrivien.loai-bai-dang-con.add_subcategory',['uniqueItemType'=>$uniqueItemType]);
    }
    public function create(Request $request){
        
        $subcategory = new Subcategory();
        $subcategory->name = $request->input('name');
        $subcategory->parent_id = $request->input('parent_id');
        $subcategory->save();
    
        // Thực hiện các thao tác khác hoặc chuyển hướng
        
        return redirect()->back()->with('success', 'Thêm loại tin tức con thành công');
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
