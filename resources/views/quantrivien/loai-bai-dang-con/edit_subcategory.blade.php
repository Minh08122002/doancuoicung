@extends('layouts.layoutadmin')

@section('title', 'Chỉnh sửa tài khoản')

@section('content')
<head>
<link rel="stylesheet" href="{{ url('/css/post.css')}}" />
</head>
<h1 style="text-align:center;">Chỉnh sửa loại bài đăng con</h1>
<form action="{{ route('admin.loai-bai-dang-con.cap-nhat',['id' => $subcategory->id]) }}" method="POST">
    @csrf
        <div class="inputs">
        <label for="text" style="margin-right: 10px;">Tên loại bài đăng con: </label>
        <input type="text" name="name" id="name" placeholder="{{$subcategory->name}}">
        </div>
        <div class="inputs">
        <h2 class="items">Chọn loại bài đăng cha: </h2>
            <select class="mySelect" style="height: 40px; margin-top: 18px;" name="parent_id">
                <option value="">loại</option>
                @foreach($uniqueItemType as $uniqueItemType)
                    <option value="{{ $uniqueItemType->id }}">{{ $uniqueItemType->name }}</option>
                @endforeach
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
@endsection