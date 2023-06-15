<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;
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
    $query = User::query()->where('role', '<>', 0);
    
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
    $userCount = User::where('role', '<>', 0)->count();

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
            Alert::success('Đăng nhập thành công', 'xin chào: '.$user->name);
            return redirect()->route('admin.loai-bai-dang.index');
        } elseif ($role == 2) {
            return redirect()->route('admin.loai-bai-dang.index');
        } elseif ($role == 3) {
            Alert::error('Đăng nhập không thành công', 'Tài khoản của bạn không có quyền truy cập vào trang quản lí!! ');
            return redirect()->back();
        }
        
    } else {
        Alert::error('Đăng nhập không thành công', 'Tài khoản hoặc mật khẩu không chính xác! ');
        return redirect("dang-nhap");
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
            return redirect()->route('admin.tai-khoan.index');
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
        $user->password = $request->input('password') ? Hash::make($request->input('password')) : $user->password;
        $user->name = $request->input('name') ?? $user->name;
        $newPhone = $request->input('phone') ?? $user->phone;
            // Kiểm tra số điện thoại mới có trùng với người dùng khác không
            $existingUser = User::where('phone', $newPhone)->first(); //first trả về kết quả đầu tiên của 1 đối tượng nếu không có trả về null
            if ($existingUser) { // kiểm tra nếu trùng
                Alert::error('Lỗi', 'Số điện thoại đã tồn tại.');
                return redirect()->back()->withInput();
            }
    
            // Cập nhật số điện thoại
        $user->phone = $newPhone;
        $user->address = $request->input('address') ?? $user->address;
        $user->role = $request->input('role') ?? $user->role;
        $user->avatar = $avatarUrl ?? $user->avatar;

        $user->save();
        Alert::success('Thành công', 'Cập nhật tài khoản thành công.');
    
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
}
