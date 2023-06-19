@extends('layouts.layoutadmin')

@section('title', 'Thêm chi tiết trẻ')
 
@section('content')
<head>
  <link rel="stylesheet" href="{{ url('/css/post.css')}}" />
</head>
<h1 style=" text-align: center;">Thêm chi tiết trẻ</h1>
<form action="{{ route('admin.hoc-sinh.create') }}" method="POST">
@csrf
<div class="container">
  <div class="inputs">
      <h3 style="margin-right: 10px;">Tên trẻ: </h3>
      <input type="text" name="name" placeholder="Nhập tên học sinh">
  </div>
  <div class="inputs">
      <h3 style="padding:10px">Chọn phụ huynh:</h3>
        <select class="mySelect" style="height: 40px;margin-right: 10px;" name="user_id">
                <option value="">Phụ huynh</option>
                @foreach($user as $user)
                @if ($user->role == 3 || $user->role == 2 )
                    <option value="{{ $user->id }}">{{ $user->email }}</option>
                @endif
            @endforeach
        </select>
  </div>
  <div class="inputs">
      <h3 style="padding:10px">Chọn lớp:</h3>
        <select class="mySelect" style="height: 40px;margin-right: 10px;" name="room_id">
                <option value="">Chọn lớp</option>
                @foreach($room as $room)
                <option value="{{ $room->id }}">{{ $room->name }}</option>
                @endforeach
        </select>
  </div>
  <div>
      <h3 style="margin-right: 10px;">Địa chỉ: </h3>
      <input type="text" name="address" placeholder="Nhập địa chỉ">
  </div>
</div>
<button type="submit" style=" float: right; margin-left: 10px; margin-top: 17px; background-color: rgb(0, 250, 54); height: 40px;">Đăng bài</button>
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