@extends('layouts.layoutadmin')

@section('title', 'Thêm loại tin tức con')
@section('content')
<head>
    <link rel="stylesheet" href="{{ url('/css/item_type.css')}}">
</head>
<h2 style="text-align: center;">Thêm loại tin tức con</h2>
<form action="{{ route('admin.loai-bai-dang-con.xu-li-them-loai-bai-dang-con') }}" method="POST">
    @csrf
    <div class="container">
        <h2 class="items">Chọn loại bài đăng cha: </h2>
        <select class="mySelect" style="height: 40px; margin-top: 18px;" name="parent_id">
            <option value="">loại</option>
                @foreach($uniqueItemType as $uniqueItemType)
                @if ($uniqueItemType->status == 1)
                <option value="{{ $uniqueItemType->id }}">{{ $uniqueItemType->name }}</option>
                @endif
            @endforeach
            
        </select>
    </div>
    <div class="container">
        <h2>Tên loại bài đăng con:</h2>
        <input type="text" id="name" name="name" placeholder="Nhập tên loại bài đăng con">
    </div>
    <div class="inputs">
    <h3 style=" padding-right: 10px;">Trạng thái: </h3>
     <select class="mySelect" style="height: 40px; width: 110px; margin-right: 10px;" name="status">
            <option value="">Trạng thái</option>
            <option value="1">Xuất bản</option>
            <option value="0">Nháp</option>
      </select>
  </div>
    <button class="favorite styled" type="submit" style="margin-left: 10px; margin-top: 17px; background-color: rgb(0, 250, 54); height: 40px;">Xác nhận</button>
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
<form>

@endsection