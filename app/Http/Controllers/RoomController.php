<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\itemtype;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;
use App\Models\subcategory;
use App\Models\post;
use App\Models\Room;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Models\Student;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
    /**
     * Lấy số lượng của phòng.
     */
    $roomCount = Room::count();
    $itemRoom = Room::select('name')->get();

    /**
     * Lấy thông tin nhập từ người dùng.
     */
    $name = $request->input('name');

    /**
     * Truy vấn thông tin phòng và kết nối với bảng user để lấy tên giáo viên.
     */
    $query = Room::join('user as user1', 'room.user_id_1', '=', 'user1.id')
        ->join('user as user2', 'room.user_id_2', '=', 'user2.id')
        ->select('room.*', 'user1.name as user1_name', 'user2.name as user2_name');

    /**
     * Lọc theo trạng thái và tên.
     */
    if ($name !== null) {
        $query->where('room.name', $name);
    }

    /**
     * Phân trang kết quả truy vấn.
     */
    $listRoom = $query->paginate(6);

    /**
     * Lấy thông tin trang trước, trang hiện tại, trang tiếp theo và số trang cuối cùng.
     */
    $previousPageUrl = $listRoom->previousPageUrl();
    $currentPage = $listRoom->currentPage();
    $nextPageUrl = $listRoom->nextPageUrl();
    $lastPage = $listRoom->lastPage();

    return view('quantrivien.lop-hoc.room', compact('listRoom', 'roomCount', 'previousPageUrl', 'currentPage', 'nextPageUrl', 'lastPage', 'itemRoom'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = User::where('role', 2)->get();
        return view('quantrivien.lop-hoc.add_room', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:room,name',
            'start_date' => 'required',
            'end_date' => 'required',
            'user_1' => 'required',
            'user_2' => 'required|different:user_1',
        ]);
    
        if ($validator->fails()) {
            Alert::error('Thất bại', 'Tạo lớp không thành công.');
            return redirect()->back();
        }
    
        $room = new Room();
        $room->name = $request->input('name');
        $room->user_id_1 = $request->input('user_1');
        $room->user_id_2 = $request->input('user_2');
        $room->start_date = $request->input('start_date');
        $room->end_date = $request->input('end_date');
        $room->save();
    
        Alert::success('Thành công', 'Thành công.');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $room = Room::find($id);
        $studenCount = Student::where('room_id', $id)->count();
        $student = Student::where('room_id', $id)->get();
        if ($room) {
            $user_1 = User::find($room->user_id_1)->name;
            $user_2 = User::find($room->user_id_2)->name;
        }
        return view('quantrivien.lop-hoc.show_room', compact('room', 'user_1', 'user_2', 'studenCount', 'student'));
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $room = Room::find($id);
        $teacher = User::whereNotExists(function ($query) {
            $query->select(DB::raw(1))
                  ->from('room')
                  ->whereRaw('user.id = room.user_id_1')
                  ->orWhereRaw('user.id = room.user_id_2');
        })
        ->where('role', 2)
        ->get();
        $student = Student::whereNull('room_id')->get();
        return view('quantrivien.lop-hoc.edit_room', compact('room','teacher', 'student'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $room = Room::find($id);
        $room->name = $request->input('name') ?? $room->name;
        $room->user_id_1 = $request->input('user_id_1')??$room->user_id_1;
        $room->user_id_2 = $request->input('user_id_2')??$room->user_id_2;
        $room->save();

        $room_id = $request->input('room_id');
        $student = Student::find($room_id);
        if ($student) {
            $student->room_id = $room->id;
            $student->save();
        }
        
        Alert::success('Thành công', 'Cập nhật bài đăng thành công.');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $student = Student::find($id);

        if ($student) {
            $student->update(['room_id' => null]);
            return redirect()->route('admin.lop-hoc.index');
        } else {
            // Người dùng không tồn tại
            return redirect()->route('admin.lop-hoc.show');
        }
    }
}
