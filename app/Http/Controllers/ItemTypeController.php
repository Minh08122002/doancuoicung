<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\itemtype;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class ItemTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        /**
         * Lấy số lượng của loại tin tức.
         * Lấy tên loại tin tức.
         */
        $itemTypeCount = ItemType::count();
        $itemType = ItemType::all();
        $uniqueItemType = $itemType->unique('name');
        /**
         * Lấy thông tin nhập từ người dùng.
         */
        $status = $request->input('status');
        $name = $request->input('name');
        /**
         * Hiển thị tên người đăng.
         */
        $query = ItemType::join('user', 'item_type.created_by', '=', 'user.id')
        ->select('item_type.*', 'user.name as created_by_name');
        /**
         * Lọc theo trạng thái và tên loại bài đăng.
         */
        if ($status !== null) {
            $query->where('item_type.status', $status);
        }

        if ($name !== null) {
            $query->where('item_type.name', $name);
        }
        
        $listItemType = $query->paginate(6);

        $uniqueItemType = ItemType::with('children')->get();

        return view('quantrivien.loai-bai-dang.item_layout', compact('listItemType'), ['itemTypeCount' => $itemTypeCount, 'itemType' => $itemType, 'uniqueItemType'=>$uniqueItemType]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function showadd(){
        return view('quantrivien.loai-bai-dang.add_item_layout');
    }
    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:item_type', // Kiểm tra tên loại bài đăng là duy nhất trong bảng 'item_types'
            // Các quy tắc kiểm tra khác (nếu có)
        ]);
        $itemType = new ItemType();
        $itemType->name = $validatedData['name'];
        $itemType->created_by = Auth::id();
        $itemType->comments = $request->input('comments');
        $itemType->status = $request->input('status');
        $itemType->save();
    
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
        $itemtype = itemtype::find($id);
        $createdByName = null;
        $updatedByName = null;

        if ($itemtype) {
            $createdByName = $itemtype->createdBy->name;
            $updatedByName = $itemtype->updatedBy->name ?? null;
        }
        return view('quantrivien.loai-bai-dang.show_item_layout', compact('itemtype', 'createdByName','updatedByName'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $itemType = ItemType::find($id);
        return view('quantrivien.loai-bai-dang.edit_item_layout', compact('itemType'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
{
    $validator = Validator::make($request->all(), [
        'status' => 'required'
    ]);

    if ($validator->fails()) {
        Alert::error('Lỗi', 'Vui lòng điền đầy đủ thông tin.');
        return redirect()->back()->withErrors($validator)->withInput();
    }

    $itemType = ItemType::find($id);
    $itemType->name = $request->input('name') ?? $itemType->name;
    $itemType->status = $request->input('status');
    $itemType->updated_by = Auth::id();
    $itemType->updated_at = now();
    $itemType->save();

    Alert::success('Thành công', 'Cập nhật loại bài đăng thành công.');
    return redirect()->back();
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $itemType = ItemType::find($id);

        if ($itemType) {
            $itemType->delete();
            return redirect()->route('admin.loai-bai-dang.index');
        } else {
            // Người dùng không tồn tại
            return redirect()->route('admin.loai-bai-dang.index');
        }
    }
}
