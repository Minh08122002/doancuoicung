@extends('layouts.layoutadmin')

@section('title', 'Thêm lớp học')
 
@section('content')
<head>
  <link rel="stylesheet" href="{{ url('/css/post.css')}}" />
</head>
<h1 style=" text-align: center;">Thêm lớp học</h1>
<form action="{{ route('admin.lop-hoc.store') }}" method="POST">
@csrf
<div class="container">
  <div class="inputs">
      <h3 style="margin-right: 10px;">Tên lớp học: </h3>
      <input type="text" name="name" placeholder="Nhập Tên Lớp Học">
  </div>
  <div class="inputs">
    <h3 style=" padding-right: 10px;">Giáo viên 1: </h3>
     <select class="mySelect" style="height: 40px; width: 110px; margin-right: 10px;" name="user_1">
     <option value="">Giáo viên</option>
           @foreach ($user as $item)
                <option value="{{ $item->id }}">{{ $item->name }}</option>
            @endforeach
      </select>
  </div>
  <div class="inputs">
    <h3 style=" padding-right: 10px;">Giáo viên 2: </h3>
     <select class="mySelect" style="height: 40px; width: 110px; margin-right: 10px;" name="user_2">
     <option value="">Giáo viên</option>
            @foreach ($user as $item)
                <option value="{{ $item->id }}">{{ $item->name }}</option>
            @endforeach
      </select>
  </div>
  <div class="inputs">
      <label for="start_date">Ngày bắt đầu:</label>
      <input type="date" id="start_date" name="start_date">
  </div>
  <div class="inputs">
      <label for="start_date">Ngày kết thúc:</label>
      <input type="date" id="end_date" name="end_date">
  </div>
</div>
<button type="submit" style=" float: right; margin-left: 10px; margin-top: 17px; background-color: rgb(0, 250, 54); height: 40px;">Xác nhận</button>
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
        </script>
</form>
@endsection