@extends('layouts.layoutadmin')

@section('title', 'Thêm tài khoản')

@section('content')
<head>
<link rel="stylesheet" href="{{ url('/css/post.css')}}" />
</head>
<h1 style="text-align:center;">Thêm tài khoản người dùng</h1>
<form action="{{ route('admin.tai-khoan.xu-li-them-tai-khoan') }}" method="POST"  enctype="multipart/form-data">
    @csrf
    <div class="inputs">
      <label for="email" style="margin-right: 10px;">Email: </label>
      <input type="email" name="email" id="email" placeholder="Nhập email (Phải có @)">
       @error('email')
        <span class="text-red-500">{{ $message }}</span>
    @enderror
    </div>
    <div class="inputs">
      <label for="password" style="margin-right: 10px;">Mật khẩu: </label>
      <input type="password" name="password" id="password" placeholder="Nhập password">
    </div>
    <div class="inputs">
      <label for="password_confirmation" style="margin-right: 10px;">Xác nhận mật khẩu: </label>
      <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Nhập lại password">
    </div>
    <div class="inputs">
      <label for="name" style="margin-right: 10px;">Họ và tên: </label>
      <input type="text" name="name" id="name" placeholder="Nhập họ và tên">
    </div>
    <div class="inputs">
      <label for="phone" style="margin-right: 10px;">Số điện thoại: </label>
      <input type="number" name="phone" id="phone" placeholder="Nhập số điện thoại">
    </div>
    <div class="inputs">
      <label for="address" style="margin-right: 10px;">Nhập địa chỉ: </label>
      <input type="text" name="address" id="address" placeholder="Nhập địa chỉ">
    </div>
    <div class="inputs">
    <h3 style="padding-right: 10px;">Trạng thái: </h3>
     <select class="mySelect" style="height: 40px; width: 110px; margin-right: 10px;" name="role">
            <option value="2">Giáo viên</option>
            <option value="1">Quản trị viên</option>
            <option value="3">Phụ huynh</option>
      </select>
    </div>
    <div class="inputs">
      <label for="avatar" style="margin-right: 10px;">Ảnh đại diện: </label>
      <input type="file" name="avatar" id="avatar">
    </div>
    <button type="submit" style=" float: right; margin-left: 10px; margin-top: 17px; background-color: rgb(0, 250, 54); height: 40px;">Xác nhận</button>
</form>
@endsection