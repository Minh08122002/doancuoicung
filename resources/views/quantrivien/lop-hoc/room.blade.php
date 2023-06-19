@extends('layouts.layoutadmin')

@section('title', 'Danh sách lớp học')

@section('content')
<head>
<link rel="stylesheet" href="{{ url('/css/item_type.css')}}">
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<form action="{{ route('admin.lop-hoc.index') }}" method="GET">
    @csrf
    <div class="container">
        <h3>Thêm lớp học</h3>
<a href="{{route('admin.lop-hoc.create')}}" class="favorite styled" style="margin: 10px">Thêm lớp học</a>
    </div>
    <div class="form-group">
        <div>
            <h3 class="item">Số lượng lớp:{{$roomCount}}</h3>
        </div>
        <h3 class="items">lớp:</h3>
        <select class="mySelect" style="height: 40px; margin-top: 18px;" name="name">
            <option value="">Lớp</option>
          @foreach($itemRoom as $item)
                    <option value="{{ $item->name }}">{{ $item->name }}</option>
            @endforeach
        </select>
        <button class="favorite styled" type="submit" style="margin-left: 10px; margin-top: 17px; background-color: rgb(0, 250, 54); height: 40px;">Lọc</button>
        <button class="favorite styled" style="margin-left: 10px; margin-top: 17px; background-color: rgb(0, 250, 54); height: 40px;"><a href="{{ $previousPageUrl }}" class="previous-page" style="  text-decoration: none;"><</a></button>
        <span style="margin-left: 10px; margin-top:30px;">Trang {{ $currentPage }}/{{ $lastPage }}</span>
        <button class="favorite styled" style="margin: 10px; margin-top: 17px; background-color: rgb(0, 250, 54); height: 40px;"><a href="{{ $nextPageUrl }}" class="next-page" style="  text-decoration: none;">></a></button>
    </div>
</form>

<table class="styled-table">
    <thead>
        <tr>
            <th>Tên lớp học</th>
            <th>Giáo viên 1</th>
            <th>Giáo viên 2</th>
            <th>Năm bắt đầu</th>
            <th>Năm kết thúc</th>
            <th>Chức năng</th>
        </tr>
    </thead>
    <tbody>
   @foreach ($listRoom as $listRoom)
        <tr>
            <td>{{ $listRoom->name }}</td>
            <td>{{ $listRoom->user1_name }}</td>
            <td>{{ $listRoom->user2_name }}</td>
            <td>{{ $listRoom->start_date }}</td>
            <td>{{ $listRoom->end_date }}</td>
            <td>
                <a href="{{route('admin.lop-hoc.show', ['id' => $listRoom->id])}}" class="favorite styled" type="detail" style="margin-right: 10px; background-color: rgb(0, 250, 54);">Chi tiết</a>
                <a href="{{route('admin.lop-hoc.edit', ['id' => $listRoom->id])}}" class="favorite styled" type="detail" style="margin-right: 10px; background-color: red;">Chỉnh sửa</a>
                
            </td>
        </tr>
    @endforeach
    </tbody>
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
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script>
            document.getElementById("deleteButton").addEventListener("click", function(event) {
                event.preventDefault(); // Ngăn chặn sự kiện mặc định của nút xóa
                swal({
                    title: "Bạn có muốn xóa bài đăng?",
                    text: "Nhấn OK để tiếp tục, Cancel để hủy.",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        swal("Xóa thành công!", {
                                icon: "success",
                            });
                            // Thực hiện hành động xóa tại đây
                            document.getElementById("form-delete").submit();
                    } else {
                        // Hủy hành động xóa
                        swal("Hủy thành công!");
                    }
                });
            });
        </script>
</table>
@endsection