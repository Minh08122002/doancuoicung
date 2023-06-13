<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function themtaikhoan(Request $request)
{
    if ($request->hasFile('avatar')) {
        $avatar = $request->file('avatar');
        $filename = time() . '.' . $avatar->getClientOriginalExtension();
        $avatar->storeAs('public/avatars', $filename);
        $avatarUrl = '/storage/avatars/' . $filename;
    } else {
        $avatarUrl = null;
    }
    
    $user = new User();
    $user->email = $request->input('email');
    $user->password = Hash::make($request->input('password'));
    $user->name = $request->input('name');
    $user->phone = $request->input('phone');
    $user->address = $request->input('address');
    $user->role = $request->input('role');
    $user->avatar = $avatarUrl;
    $user->save();
    
    return redirect()->back();
    
}

    public function showthemtaikhoan(){
        return view('quantrivien.tai-khoan.add_user');
    }
    public function index(Request $request)
{
    $query = User::query()->where('role', '<>', 0);;
    
    /**
     * Lấy thông tin nhập từ người dùng.
     */
    $role = $request->input('role');
    
    /**
     * Lọc theo trạng thái và tên loại bài đăng.
     */
    if ($role !== null) {
        $query->where('user.role', $role);
    }

    $listUser = $query->paginate(6);
    $userCount = User::count();

    return view('quantrivien.tai-khoan.user', compact('listUser', 'userCount'));
}
    public function login()
    {
        return view('login');
    }

    public function store(Request $request)
{
    $request->validate([
        'email' => 'required',
        'password' => 'required',
    ]);

    $credentials = $request->only('email', 'password');
    if (Auth::attempt($credentials)) {
        // Lưu thông tin tài khoản đăng nhập vào session
        $user = Auth::user();
        session(['user' => $user, 'id' => $user->id, 'name' => $user->name, 'email' => $user->email, 'role' => $user->role ]);
        $role = intval($user->role);
        // Chuyển hướng tới trang tương ứng với vai trò
        if ($role == 1 || $role == 0) {
            return redirect()->route('admin.loai-bai-dang.index');
        } elseif ($role == 2) {
            return redirect()->route('admin.loai-bai-dang.index');
        } elseif ($role == 3) {
            return redirect()->route('parent');
        }
    } else {
        return redirect("dang-nhap",)->withSuccess('Login details are not valid');
    }
}


    public function create()
    {
        return view('layouts.footer');
    }
    /**
     * Show the form for creating a new resource.
     */
   

    /**
     * Store a newly created resource in storage.
     */


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::find($id);
        return view('quantrivien.tai-khoan.showuser',  compact('user'));
    }
    public function destroy($id)
    {
        $user = User::find($id);

        if ($user) {
            $user->delete();
            // Thực hiện xóa thành công
            return redirect()->route('admin.tai-khoan.index')->with('success', 'Xóa tài khoản thành công!');
        } else {
            // Người dùng không tồn tại
            return redirect()->route('admin.tai-khoan.index')->with('error', 'Không tìm thấy tài khoản!');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::find($id);
        return view('quantrivien.tai-khoan.edit_user', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            $avatar->storeAs('public/avatars', $filename);
            $avatarUrl = '/storage/avatars/' . $filename;
        } else {
            $avatarUrl = null;
        }
        $user = User::find($id);
        $user->password = hash::make($request->input('password'));
        $user->name = $request->input('name');
        $user->phone = $request->input('phone');
        $user->address = $request->input('address');
        $user->name = $request->input('role');
        $user->avatar = $avatarUrl;
        // Lưu thay đổi vào cơ sở dữ liệu
        $user->save();
    
        return redirect()->back()->with('success', 'Cập nhật tài khoản thành công.');
    }

    /**
     * Remove the specified resource from storage.
     */
}
