@extends('layouts.layoutadmin')

@section('title', 'Danh sách loại tin tức')

@section('content')
<head>
<link rel="stylesheet" href="{{ url('/css/item_type.css')}}">
</head>
<form action="{{ route('admin.loai-bai-dang.index') }}" method="GET">
    @csrf
    <div class="container">
        <h3>Thêm loại tin tức</h3>
        <button class="favorite styled" type="button" style="margin: 10px">Thêm loại tin tức</button>
    </div>
    <div class="form-group">
        <div>
            <h3 class="item">Số lượng:{{$itemTypeCount}}</h3>
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
            @foreach($uniqueItemType as $uniqueItemTypes)
                <option value="{{ $uniqueItemTypes->name }}">{{ $uniqueItemTypes->name }}</option>
                @foreach($uniqueItemTypes->children as $child)
                    <option value="{{ $child->id }}" style = "padding: 20px;"> {{ $child->name }}</option>
                @endforeach
            @endforeach
        </select>
        <button class="favorite styled" type="submit" style="margin-left: 10px; margin-top: 17px; background-color: rgb(0, 250, 54); height: 40px;">Lọc</button>
        <button class="favorite styled" style="margin-left: 10px; margin-top: 17px; background-color: rgb(0, 250, 54); height: 40px;"><a href="{{ $listItemType->previousPageUrl() }}" class="previous-page" style="  text-decoration: none;"><</a></button>
        <span style="margin-left: 10px; margin-top:30px;">Trang {{ $listItemType->currentPage() }}/{{ $listItemType->lastPage() }}</span>
        <button class="favorite styled" style="margin: 10px; margin-top: 17px; background-color: rgb(0, 250, 54); height: 40px;"><a href="{{ $listItemType->nextPageUrl() }}" class="next-page" style="  text-decoration: none;">></a></button>
    </div>
</form>

<table class="styled-table">
    <thead>
        <tr>
            <th>Tên loại bài đăng</th>
            <th>Người đăng</th>
            <th>trạng thái</th>
            <th>Ngày đăng</th>
            <th>Chức năng</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($listItemType as $listItemType)
        <tr>
            <td>{{$listItemType->name}}</td>
            <td>{{$listItemType->created_by_name}}</td>
            <td>
                @if($listItemType->status == 0)
                        Nháp
                @elseif($listItemType->status == 1)
                        Xuất bản
                @endif
            </td>
            <td>{{$listItemType->created_at}}</td>
            <td>
            <button class="favorite styled" type="detail" style = " margin-right: 10px; background-color: rgb(0, 250, 54);">Chi tiết</button>
            <button class="favorite styled" type="edit" style = " background-color: rgb(255, 0, 0); ">chỉnh sửa</button>
            </td>
        </tr>
    @endforeach
        <!-- and so on... -->
    </tbody>
</table>
@endsection