@extends('layouts.layoutadmin')

@section('title', 'Danh sách tài khoản')
@section('content')
<head>
    <link rel="stylesheet" href="{{ url('/css/item_type.css')}}">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<form action="{{ route('admin.tai-khoan.index') }}" method="GET">
    @csrf
    <div class="container">
        <h3>Thêm tài khoản</h3>
        <a href="{{ route('admin.tai-khoan.show-them-tai-khoan') }}" class="favorite styled" type="button" style="text-decoration: none; margin: 10px">Thêm tài khoản</a>
    </div>
    <div class="form-group">
        <div>
            <h3 class="item">Số lượng: {{ $userCount }}</h3>
        </div>
        <h3 class="items">Chức vụ:</h3>
        <select class="mySelect" style="height: 40px; margin-top: 18px;" name="role">
            <option value="">Chức vụ</option>
            <option value="1">Quản trị viên</option>
            <option value="2">Giáo viên</option>
            <option value="3">phụ huynh</option>
        </select>
        <button class="favorite styled" type="submit" style="margin-left: 10px; margin-top: 17px; background-color: rgb(0, 250, 54); height: 40px;">Lọc</button>
        <button class="favorite styled" style="margin-left: 10px; margin-top: 17px; background-color: rgb(0, 250, 54); height: 40px;"><a href="{{ $listUser->previousPageUrl() }}" class="previous-page" style="  text-decoration: none;"><</a></button>
        <span style="margin-left: 10px; margin-top:30px;">Trang {{ $listUser->currentPage() }}/{{ $listUser->lastPage() }}</span>
        <button class="favorite styled" style="margin: 10px; margin-top: 17px; background-color: rgb(0, 250, 54); height: 40px;"><a href="{{ $listUser->nextPageUrl() }}" class="next-page" style="  text-decoration: none;">></a></button>
    </div>
</form>

<table class="styled-table">
    <thead>
        <tr>
            <th>Email</th>
            <th>Họ tên</th>
            <th>Số điện thoại</th>
            <th>Địa chỉ</th>
            <th>Chức vụ</th>
            <th>Chức năng</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($listUser as $listUser)
        <tr>
            <td>{{$listUser->email}}</td>
            <td>{{$listUser->name}}</td>
            <td>{{$listUser->phone}}</td>
            <td>{{$listUser->address}}</td>
            <td>
            @if ($listUser->role == 1)
                Quản trị viên
            @elseif ($listUser->role == 2)
                Giáo viên
            @else
                Phụ huynh
            @endif
            </td>
            <td>
            @if (session('role') == 0)
                <a href="{{ route('admin.tai-khoan.show-tai-khoan', ['id' => $listUser->id]) }}" class="favorite styled" style="margin-right: 10px; background-color: rgb(0, 250, 54);">Chi tiết</a>    
                <a href="{{ route('admin.tai-khoan.chinh-sua', ['id' => $listUser->id]) }}" class="favorite styled" style="margin-right: 10px; background-color: rgb(0, 250, 54);">Chỉnh sửa</a>    
                    <form id="form-delete" action="{{ route('admin.tai-khoan.destroy', ['id' => $listUser->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" id="deleteButton" class="favorite styled" style="margin-right: 10px; background-color: rgb(0, 250, 54);">Xóa tài khoản</button>
                    </form>

                    @elseif ($listUser->role == 2)
                        <a href="{{ route('admin.tai-khoan.show-tai-khoan', ['id' => $listUser->id]) }}" class="favorite styled" style="margin-right: 10px; background-color: rgb(0, 250, 54);">Chi tiết</a>
                        <button class="favorite styled" type="edit" style = " background-color: rgb(255, 0, 0); ">chỉnh sửa</button>
                    @endif
            </td>
        </tr>
    @endforeach
        <!-- and so on... -->
    </tbody>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        document.getElementById("deleteButton").addEventListener("click", function(event) {
            event.preventDefault(); // Ngăn chặn sự kiện mặc định của nút xóa
            swal({
                title: "Bạn có muốn xóa tài khoản?",
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