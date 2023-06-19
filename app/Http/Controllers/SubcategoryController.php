<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;   
use Illuminate\Http\Request;
use App\Models\itemtype;
use App\Models\Subcategory;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Validation\Rule;

class SubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        /**
         * Lấy số lượng của loại tin tức.
         * Lấy tên loại tin tức.
         */
        $itemTypeCount = Subcategory::count();
        /**
         * Hiển thị tên người đăng.
         */
        $query = Subcategory::query();
        $listItemType = $query->paginate(6);
        return view('quantrivien.loai-bai-dang-con.subcategory', compact('listItemType', 'itemTypeCount'));
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
        $validator = Validator::make($request->all(), [
            'parent_id' => 'required',
        ]);
    
        if ($validator->fails()) {
            Alert::error('Thất bại', 'Tạo loại bài đăng con không thành công.');
            return redirect()->back();
        }
        $subcategory = new Subcategory();
        $subcategory->name = $request->input('name');
        $subcategory->parent_id = $request->input('parent_id');
        $subcategory->status = $request->input('status');
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
        $subcategory = Subcategory::find($id);
        $nameitemtype = null;
        if ($subcategory) {
            $nameitemtype = $subcategory->parent_id ?? null;
            if ($subcategory->parent_id) {
                $nameitemtype = itemType::where('id', $subcategory->parent_id)->value('name');
            }
        }
        return view('quantrivien.loai-bai-dang-con.show_subcategory', compact('nameitemtype','subcategory'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $subcategory = Subcategory::find($id);
        $itemType = ItemType::all();
        $uniqueItemType = $itemType->unique('name');
        return view('quantrivien.loai-bai-dang-con.edit_subcategory', compact('subcategory','uniqueItemType'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $subcategory = Subcategory::find($id);
        $subcategory->name = $request->input('name') ?? $subcategory->name;
        $subcategory->parent_id = $request->input('parent_id')??$subcategory->parent_id;
        $subcategory->status = $request->input('status')??$subcategory->status;
        $subcategory->updated_at = now();
        $subcategory->save();

        Alert::success('Thành công', 'Cập nhật bài đăng thành công.');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $subcategory = Subcategory::find($id);

        if ($subcategory) {
            $subcategory->delete();
            return redirect()->route('admin.loai-bai-dang-con.index');
        } else {
            // Người dùng không tồn tại
            return redirect()->route('admin.loai-bai-dang-con.index');
        }
    }
}
