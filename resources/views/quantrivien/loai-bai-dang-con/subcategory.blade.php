@extends('layouts.layoutadmin')

@section('title', 'Danh sách loại tin tức con')
@section('content')
<head>
<link rel="stylesheet" href="{{ url('/css/item_type.css')}}">
</head>
    @csrf
    <div class="container">
        <h3>Thêm loại tin tức con</h3>
<a href="{{ route('admin.loai-bai-dang-con.showadd') }}" class="favorite styled" style="margin: 10px">Thêm bài đăng</a>
    </div>
    <div class="form-group">
        <div>
            <h3 class="item">Số lượng: {{ $itemTypeCount }}</h3>
        </div>
        <button class="favorite styled" style="margin-left: 10px; margin-top: 17px; background-color: rgb(0, 250, 54); height: 40px;"><a href="{{ $listItemType->previousPageUrl() }}" class="previous-page" style="  text-decoration: none;"><</a></button>
        <span style="margin-left: 10px; margin-top:30px;">Trang {{ $listItemType->currentPage() }}/{{ $listItemType->lastPage() }}</span>
        <button class="favorite styled" style="margin: 10px; margin-top: 17px; background-color: rgb(0, 250, 54); height: 40px;"><a href="{{ $listItemType->nextPageUrl() }}" class="next-page" style="  text-decoration: none;">></a></button>
    </div>
</form>

<table class="styled-table">
    <thead>
        <tr>
            <th>Tên loại bài đăng con</th>
            <th>Tên loại bài đăng cha</th>
            <th>Chức năng</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($listItemType as $listItemType)
        <tr>
            <td>{{$listItemType->name}}</td>
            <td>{{$listItemType->parent_id}}</td>
            <td>
            <a href = "{{route('admin.loai-bai-dang-con.show', ['id' => $listItemType->id])}}" class="favorite styled" type="detail" style = " margin-right: 10px; background-color: rgb(0, 250, 54);">Chi tiết</a>
            <a href = "{{route('admin.loai-bai-dang-con.chinh-sua', ['id' => $listItemType->id])}}" class="favorite styled" type="edit" style = " background-color: rgb(255, 0, 0); ">chỉnh sửa</a>
            <form id="form-delete" action="{{ route('admin.loai-bai-dang-con.destroy', ['id' => $listItemType->id]) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" id="deleteButton" class="favorite styled" style="margin-right: 10px; background-color: rgb(0, 250, 54);">Xóa bài đăng</button>
            </form>
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