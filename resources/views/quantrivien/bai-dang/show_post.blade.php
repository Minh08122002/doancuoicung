@extends('layouts.layoutadmin')

@section('title', 'Chi tiết bài đăng')

@section('content')
<div class="container">
        <h1>Thông tin Bài đăng</h1>
        <p><strong>Tên bài đăng:</strong> {{ $post->title }}</p>
        <p><strong>Người đăng:</strong> {{ $createdByName }}</p>
        <p><strong>Người sửa:</strong> {{ $updatedByName }}</p>
        <p><strong>Loại bài đăng:</strong> {{ $itemType }}</p>
        <p><strong>Nội dung:</strong> {{ $post->content }}</p>
        <p><strong>Trạng thái:</strong>
        @if ($post->status == 0)
            Nháp
        @elseif($post->status == 1)
            Xuất bản
        @endif 
        </p>
        <p><strong>Ngày đăng:</strong> {{ $post->created_at }}</p>
        <p><strong>Ngày sửa:</strong> {{ $post->updated_at }}</p>
    </div>
@endsection