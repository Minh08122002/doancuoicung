@extends('layouts.layoutadmin')

@section('title', 'Chi tiết lớp học')

@section('content')
<head>
<link rel="stylesheet" href="{{ url('/css/item_type.css')}}">
</head>
<div>
        <h1>Thông tin lớp học</h1>
        <p><strong>Mã lớp học:</strong> {{ $room->id }}</p>
        <p><strong>Tên lớp học:</strong> {{ $room->name }}</p>
        <p><strong>Giáo viên 1:</strong> {{ $user_1 }}</p>
        <p><strong>Giáo viên 2::</strong> {{ $user_2 }}</p>
        <p><strong>Số lượng trẻ:</strong> {{ $studenCount }}</p>
        <p><strong>Khóa học bắt đầu:</strong> {{ $room->start_date }}</p>
        <p><strong>Khóa học kết thúc:</strong> {{ $room->end_date }}</p>
</div>
<table class="styled-table">
    <thead>
        <tr>
            <th>Tên trẻ</th>
            <th>mã lớp học</th>
            <th>Địa chỉ</th>
            <th>Chức năng</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($student as $student)
        <tr>
            <td>{{$student->name}}</td>
            <td>{{$student->room_id}}</td>
            <td>{{$student->address}}</td>
            <td>
            <a href="" class="favorite styled" type="detail" style="margin-right: 10px; background-color: rgb(0, 250, 54);">Chi tiết</a>
            <a href="" class="favorite styled" type="detail" style="margin-right: 10px; background-color: red;">Chỉnh sửa</a>
            <form id="form-delete" action="{{route('admin.lop-hoc.destroy', ['id' => $student->id])}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" id="deleteButton" class="favorite styled" style="margin-right: 10px; background-color: rgb(0, 250, 54);">Xóa bài đăng</button>
            </form>
            </td>
        </tr>
    @endforeach
@endsection