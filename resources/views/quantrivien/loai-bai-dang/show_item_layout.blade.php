@extends('layouts.layoutadmin')

@section('title', 'Chi tiết loại bài đăng')

@section('content')

<div class="container">
        <h1>Thông tin Bài đăng</h1>
        <p><strong>Tên loại bài đăng:</strong> {{ $itemtype->name }}</p>
        <p><strong>Người đăng:</strong> {{ $createdByName }}</p>
        <p><strong>Người sửa:</strong> {{ $updatedByName }}</p>
        <p><strong>Chú thích:</strong> {{ $itemtype->comments }}</p>
        <p><strong>Trạng thái:</strong>
        @if ($itemtype->status == 0)
            Nháp
        @elseif($itemtype->status == 1)
            Xuất bản
        @endif 
        </p>
        <p><strong>Ngày đăng:</strong> {{ $itemtype->created_at }}</p>
        <p><strong>Ngày sửa:</strong> {{ $itemtype->updated_at }}</p>
</div>

@endsection