<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\itemtype;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;
use App\Models\subcategory;
use App\Models\post;
use Carbon\Carbon;
use App\Models\User;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
{
    /**
     * Lấy số lượng của loại bài đăng
     * Lấy tên loại tin tức.
     */
    $itemPostCount = Post::count();
    $itemType = ItemType::all();
    $uniqueItemType = $itemType->unique('name');
    /**
     * Lấy thông tin nhập từ người dùng.
     */
    $status = $request->input('status');
    $name = $request->input('name');
    /**
     * Hiển thị tên người đăng.
     */
    $query = Post::join('user', 'post.created_by', '=', 'user.id')
    ->join('subcategory as it1', 'post.parent_id', '=', 'it1.id')
    ->join('subcategory as it2', 'post.parent_id', '=', 'it2.id')
    ->select('post.*', 'user.name as created_by_name', 'it1.name as item_type_name');

    /**
     * Lọc theo trạng thái và tên loại bài đăng.
     */
    if ($status !== null) {
        $query->where('post.status', $status);
    }

    if ($name !== null) {
        $query->join('subcategory', 'post.parent_id', '=', 'subcategory.id')
            ->join('item_type', 'subcategory.parent_id', '=', 'item_type.id')
            ->where('item_type.name', $name)
            ->orWhere('subcategory.name', $name)
            ->with('subcategory');
    }
         

    $listPostType = $query->paginate(6);

    $uniquePostType = Post::with('children')->get();

    return view('quantrivien.bai-dang.post', compact('listPostType', 'itemPostCount', 'uniqueItemType', 'uniquePostType'));
}

    public function addpost()
    {
        $itemType = ItemType::all();
        $uniqueItemType = $itemType->unique('name');
        $uniqueItemType = ItemType::with('children')->get();
        return view('quantrivien.bai-dang.add_post',['uniqueItemType'=>$uniqueItemType]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|unique:post,title',
            'parent_id'=>'required',
            'content'=>'required',
            'status'=>'required',
        ]);
    
        if ($validator->fails()) {
            Alert::error('Thất bại', 'Đăng bài đăng không thành công.');
            return redirect()->back();
        }
    
        $post = new Post();
        $post->created_by = Auth::id();
        $post->title = $request->input('title');
        $post->parent_id = $request->input('parent_id');
        $post->content = $request->input('content');
        $post->status = $request->input('status');
        $post->save();
    
        Alert::success('Thành công', 'Đăng bài đăng thành công.');
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
        $post = Post::find($id);
        $createdByName = null;
        $updatedByName = null;
        $itemTypeName = null;
        $childrenNames = null;

        if ($post) {
            $createdByName = $post->createdBy->name;
            $updatedByName = $post->updatedBy->name ?? null;
            $itemType = $post->parent_id ?? null;
            if ($post->parent_id) {
                $itemType = subcategory::where('id', $post->parent_id)->value('name');
            }
        }



        return view('quantrivien.bai-dang.show_post', compact('post', 'createdByName','itemType','updatedByName'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::find($id);
        $itemType = ItemType::all();
        $uniqueItemType = $itemType->unique('name');
        return view('quantrivien.bai-dang.edit_post', compact('post','uniqueItemType'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
{
    $validator = Validator::make($request->all(), [
        'content' => 'required',
        'status' => 'required'
    ]);

    if ($validator->fails()) {
        Alert::error('Lỗi', 'Vui lòng điền đầy đủ thông tin.');
        return redirect()->back()->withErrors($validator)->withInput();
    }

    $post = Post::find($id);
    $post->title = $request->input('title') ?? $post->title;
    $post->parent_id = $request->input('id');
    $post->content = $request->input('content') ?? $post->content;
    $post->status = $request->input('status')??$post->status;
    $post->updated_by = Auth::id();
    $post->updated_at = now();
    $post->save();

    Alert::success('Thành công', 'Cập nhật bài đăng thành công.');
    return redirect()->back();
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::find($id);

        if ($post) {
            $post->delete();
            return redirect()->route('admin.bai-dang.index');
        } else {
            // Người dùng không tồn tại
            return redirect()->route('admin.bai-dang.index');
        }
    }
}
