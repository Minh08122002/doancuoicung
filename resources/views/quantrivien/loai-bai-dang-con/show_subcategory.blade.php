@extends('layouts.layoutadmin')

@section('title', 'Chi tiết loại bài đăng con')

@section('content')

<div class="container">
        <h1>Thông tin loại bài đăng con</h1>
        <p><strong>Tên loại bài đăng:</strong> {{ $subcategory->name }}</p>
        <p><strong>Tên loại bài đăng cha:</strong> {{ $nameitemtype }}</p>
        <p><strong>Ngày đăng:</strong> {{ $subcategory->created_at }}</p>
        <p><strong>Ngày sửa:</strong> {{ $subcategory->updated_at }}</p>
</div>
@endsection