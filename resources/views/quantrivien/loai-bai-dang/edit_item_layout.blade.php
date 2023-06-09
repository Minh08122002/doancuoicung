@extends('layouts.layoutadmin')

@section('title', 'Chỉnh sửa loại bài đăng')

@section('content')
<head>
<link rel="stylesheet" href="{{ url('/css/post.css')}}" />
<link rel="stylesheet" href="{{ url('/css/item_type.css')}}">
</head>
<h1 style="text-align:center;">Chỉnh sửa loại bài đăng</h1>
<form action="{{ route('admin.loai-bai-dang.chinh-sua',['id' => $itemType->id]) }}" method="POST"  enctype="multipart/form-data">
    @csrf
    <div class="inputs">
      <label for="text" style="margin-right: 10px;">Người đăng: </label>
      <p>{{$itemType->created_by}}</p>
    </div>
    <div class="inputs">
      <label for="text" style="margin-right: 10px;">Tên loại bài đăng: </label>
      <input type="text" name="name" placeholder="{{$itemType->name}}">
    </div>
    <div class="inputs">
        <label for="text" style="margin-right: 10px;">Chú thích: </label>
        <input type="text" name="comments" placeholder="{{$itemType->comments}}">
    </div>
    <div class="inputs">
      <h3 class="items">Trạng thái:</h3>
          <select class="mySelect" style="height: 40px; margin-top: 18px;" name="status">
              <option value="">Trạng thái</option>
              <option value="1">Xuất bản</option>
              <option value="0">Nháp</option>
          </select>
    </div>
    <button type="submit" style="float: right; margin-left: 10px; margin-top: 17px; background-color: rgb(0, 250, 54); height: 40px;">Xác nhận</button>
    </form>

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
    <script>
        CKEDITOR.replace( 'content' );
    </script>
@endsection