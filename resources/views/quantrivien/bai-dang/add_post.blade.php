@extends('layouts.layoutadmin')

@section('title', 'Thêm bài đăng')
 
@section('content')
<head>
  <link rel="stylesheet" href="{{ url('/css/post.css')}}" />
</head>
<h1 style=" text-align: center;">Thêm bài đăng</h1>
<form action="{{ route('admin.bai-dang.xu-li-them-bai-dang') }}" method="POST">
@csrf
<div class="container">
  <div>
      @if (session('role')==1)
        <h2>Cấp quyền: Admin</h2>
      @endif
  </div>
  <div>
      <h2>Người đăng bài: {{session('name')}}</h2>
  </div>
  <div class="inputs">
      <h3 style="margin-right: 10px;">Tiêu đề: </h3>
      <input type="text" name="title" placeholder="Nhập Tiêu đề">
  </div>
  <div class="inputs">
    <h3 style=" padding-right: 10px;">Trạng thái: </h3>
     <select class="mySelect" style="height: 40px; width: 110px; margin-right: 10px;" name="status">
            <option value="">Trạng thái</option>
            <option value="1">Xuất bản</option>
            <option value="0">Nháp</option>
      </select>
  </div>
  <div class="inputs">
      <h3 style="padding:10px">Loại:</h3>
        <select class="mySelect" style="height: 40px;margin-right: 10px;" name="parent_id">
                <option value="">Loại</option>
                @foreach($uniqueItemType as $uniqueItemType)
                @if ($uniqueItemType->status == 1)
                    <option value="{{ $uniqueItemType->id }}">{{ $uniqueItemType->name }}</option>
                @foreach($uniqueItemType->children as $child)
                    <option value="{{ $child->id }}" class = "child-option" style="padding: 20px; style="padding-left: 20px;">{{ $child->name }}</option>
                @endforeach
                @endif
                
            @endforeach
        </select>
  </div>
  <div>
      <h3 style="margin-right: 10px;">Nội dung: </h3>
      <textarea name="content"></textarea>
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
<script>
    CKEDITOR.replace( 'content' );
</script>

</form>
@endsection