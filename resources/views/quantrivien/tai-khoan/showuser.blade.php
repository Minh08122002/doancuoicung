@extends('layouts.layoutadmin')

@section('title', 'Chi tiết tài khoản')

@section('content')
<div class="container">
        <h1>Thông tin người dùng</h1>
        <p><strong>Tên:</strong> {{ $user->name }}</p>
        <p><strong>Email:</strong> {{ $user->email }}</p>
        <p><strong>Điện thoại:</strong> {{ $user->phone }}</p>
        <!-- Các thông tin khác về người dùng -->
    </div>
@endsection