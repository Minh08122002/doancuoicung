@extends('layouts.layoutadmin')

@section('title', 'Chỉnh sửa lớp học')

@section('content')
<head>
<link rel="stylesheet" href="{{ url('/css/post.css')}}" />
<link rel="stylesheet" href="{{ url('/css/item_type.css')}}">
</head>
<h1 style="text-align:center;">Chỉnh sửa lớp học</h1>
<form action="{{ route('admin.lop-hoc.edit',['id' => $room->id]) }}" method="POST"  enctype="multipart/form-data">
    @csrf
    <div class="inputs">
      <label for="text" style="margin-right: 10px;">Mã lớp: </label>
      <p>{{$room->id}}</p>
    </div>
    <div class="inputs">
      <label for="text" style="margin-right: 10px;">Tên lớp: </label>
      <input type="text" name="title" placeholder="{{$room->name}}">
    </div>
    <div class="inputs">
        <h3 style=" padding-right: 10px;">Giáo viên 1: </h3>
        <select class="mySelect" style="height: 40px; width: 110px; margin-right: 10px;" name="user_1">
        <option value="{{ $room->id }}">{{ $room->name }}</option>
            @foreach ($teacher as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
        </select>
    </div>
  <div class="inputs">
        <h3 style=" padding-right: 10px;">Giáo viên 2: </h3>
        <select class="mySelect" style="height: 40px; width: 110px; margin-right: 10px;" name="user_2">
        <option value="{{ $room->id }}">{{ $room->name }}</option>
            @foreach ($teacher as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
        </select>
    </div>
    <div class="inputs">
        <h3 style=" padding-right: 10px;">Thêm trẻ: </h3>
        <select class="mySelect" style="height: 40px; width: 110px; margin-right: 10px;" name="room_id">
            @foreach ($student as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
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
    <script>
        CKEDITOR.replace( 'content' );
    </script>
@endsection