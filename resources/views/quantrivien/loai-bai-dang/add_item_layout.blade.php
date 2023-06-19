@extends('layouts.layoutadmin')

@section('title', 'Thêm loại tin tức')

@section('content')
<head>
    <link rel="stylesheet" href="{{ url('/css/post.css')}}" />
</head>
<h1 style="text-align: center;">Thêm loại bài đăng</h1>
<form action="{{ route('admin.loai-bai-dang.showadd') }}" method="POST">
@csrf
<div class="container">
  <div>
      @if (session('role')==1)
        <h3>Cấp quyền: Admin</h3>
      @endif
  </div>
  <div>
      <h3>Tên người đăng: {{session('name')}}</3>
  </div>
  <div class="inputs">
      <h3 style="margin-right: 10px;">Tên loại bài đăng: </h3>
      <input type="text" name="name" placeholder="Nhập Tiêu đề">
  </div>
  <div class="inputs">
      <h3 style="margin-right: 10px;">comment: </h3>
      <input type="text" name="comments" placeholder="Nhập Tiêu đề">
  </div>
  <div class="inputs">
    <h3 style=" padding-right: 10px;">Trạng thái: </h3>
     <select class="mySelect" style="height: 40px; width: 110px; margin-right: 10px;" name="status">
            <option value="">Trạng thái</option>
            <option value="1">Xuất bản</option>
            <option value="0">Nháp</option>
      </select>
  </div>
  <button type="submit" style=" float: right; margin-left: 10px; margin-top: 17px; background-color: rgb(0, 250, 54); height: 40px;">Đăng bài</button>
</div>
@include('sweetalert::alert')
        <script src="{{ asset('vendor/sweetalert/sweetalert.all.js') }}"></script>
        <script>
            @if (session('success'))
                swal("Thành công", "{{ session('success') }}", "success");
            @endif

            @if (session('error'))
                swal("Lỗi", "{{ session('error') }}", "error");
            @endif
        </script>
</form>
@endsection