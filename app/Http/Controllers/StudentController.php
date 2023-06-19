<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\itemtype;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;
use App\Models\subcategory;
use App\Models\post;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Room;
use App\Models\Student;

class StudentController extends Controller
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
    public function addstudent(){
        $user = User::select('email', 'id', 'role')->get();
        $room = Room::select('name', 'id')->get();
        return view('quantrivien.hoc-sinh.add_hoc_sinh', compact('user', 'room'));
    }
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'user_id'=>'required',
            'room_id'=>'required',
            'address'=>'required',
        ]);
    
        if ($validator->fails()) {
            Alert::error('Thất bại', 'Thêm không thành công.');
            return redirect()->back();
        }
    
        $student = new Student();
        $student->name = $request->input('name');
        $student->user_id = $request->input('user_id');
        $student->room_id = $request->input('room_id');
        $student->address = $request->input('address');
        $student->save();
    
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
