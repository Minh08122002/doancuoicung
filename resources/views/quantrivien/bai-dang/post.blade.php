@extends('layouts.layoutadmin')

@section('title', 'Danh sách bài đăng')

@section('content')
<head>
<link rel="stylesheet" href="{{ url('/css/item_type.css')}}">
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<form action="{{ route('admin.bai-dang.index') }}" method="GET">
    @csrf
    <div class="container">
        <h3>Thêm bài đăng</h3>
<a href="{{ route('admin.bai-dang.addpost') }}" class="favorite styled" style="margin: 10px">Thêm bài đăng</a>
    </div>
    <div class="form-group">
        <div>
            <h3 class="item">Số lượng:{{$itemPostCount}}</h3>
        </div>
        <h3 class="items">Trạng thái:</h3>
        <select class="mySelect" style="height: 40px; margin-top: 18px;" name="status">
            <option value="">Trạng thái</option>
            <option value="1">Đã xuất bản</option>
            <option value="0">Nháp</option>
        </select>
        <h3 class="items">Loại:</h3>
        <select class="mySelect" style="height: 40px; margin-top: 18px;" name="name">
            <option value="">Loại</option>
          @foreach($uniqueItemType as $item)
                @if($item->status != 0)
                    <option value="{{ $item->name }}">{{ $item->name }}</option>
                    @foreach($item->children as $child)
                        @if($child->status != 0)
                            <option value="{{ $child->name }}" style="padding: 20px;">{{ $child->name }}</option>
                        @endif
                    @endforeach
                @endif
            @endforeach
        </select>
        <button class="favorite styled" type="submit" style="margin-left: 10px; margin-top: 17px; background-color: rgb(0, 250, 54); height: 40px;">Lọc</button>
        <button class="favorite styled" style="margin-left: 10px; margin-top: 17px; background-color: rgb(0, 250, 54); height: 40px;"><a href="{{ $listPostType->previousPageUrl() }}" class="previous-page" style="  text-decoration: none;"><</a></button>
        <span style="margin-left: 10px; margin-top:30px;">Trang {{ $listPostType->currentPage() }}/{{ $listPostType->lastPage() }}</span>
        <button class="favorite styled" style="margin: 10px; margin-top: 17px; background-color: rgb(0, 250, 54); height: 40px;"><a href="{{ $listPostType->nextPageUrl() }}" class="next-page" style="  text-decoration: none;">></a></button>
    </div>
</form>

<table class="styled-table">
    <thead>
        <tr>
            <th>Tên bài đăng</th>
            <th>Người đăng</th>
            <th>Loại tin tức</th>
            <th>trạng thái</th>
            <th>Ngày đăng</th>
            <th>Chức năng</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($listPostType as $listPostType)
        <tr>
            <td>{{$listPostType->title}}</td>
            <td>{{$listPostType->created_by_name}}</td>
            <td>{{$listPostType->item_type_name}}</td>
            <td>
                @if($listPostType->status == 0)
                        Nháp
                @elseif($listPostType->status == 1)
                        Xuất bản
                @endif
            </td>
            <td>{{$listPostType->created_at}}</td>
            <td>
            <a href="{{ route('admin.bai-dang.show-post', ['id' => $listPostType->id]) }}" class="favorite styled" type="detail" style="margin-right: 10px; background-color: rgb(0, 250, 54);">Chi tiết</a>
            <a href="{{ route('admin.bai-dang.chinh-sua', ['id' => $listPostType->id]) }}" class="favorite styled" type="detail" style="margin-right: 10px; background-color: red;">Chỉnh sửa</a>
            <form id="form-delete" action="{{ route('admin.bai-dang.destroy', ['id' => $listPostType->id]) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" id="deleteButton" class="favorite styled" style="margin-right: 10px; background-color: rgb(0, 250, 54);">Xóa bài đăng</button>
            </form>
            </td>
        </tr>
    @endforeach
        <!-- and so on... -->
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