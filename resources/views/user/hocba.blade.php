@section('title', 'Học Bạ')
@extends('layouts.headerfooter')
@section('content')
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ url('/css/user/hocba.css') }}">
    <title>Học Bạ</title>
</head>
<body>
<span ><img style="width: 200px;height: 60px;padding-top: 20px;padding-left:10%" src="/images/hocba/books.png"></span>
    <span style="font-size:20px;font-weight:bold">Học Bạ</span>
    <hr style="border:2px solid;width:75%">

    <div class="the">  <img class="avatar" src="/images/hocba/avatar1.png"> 
        <div>
            <span style="color: #FF0059;">B</span><span style="color: #FE1300;">é: </span>
            <span>Nguyễn Bá Lĩnh</span>
        </div>
        <div>
            <span style="color: #FF0059;">N</span><span style="color: #FE1300;">g</span><span style="color: #FF7200;">à</span><span style="color: #C3FF00;">y</span>
            <span style="color: #5DFF00;">S</span><span style="color: #00FF1D;">i</span><span style="color: #00FFF4;">n</span><span style="color: #00A3FF;">h: </span> 
            <span>08/10</span>
        </div>
        <div>
            <span style="color: #FF0059;">L</span><span style="color: #FE1300;">ớ</span><span style="color: #FF7200;">p: </span>
            <span>Mầm Lá</span>
        </div>
        <div>
            <span style="color: #FF0059;">P</span><span style="color: #FE1300;">h</span><span style="color: #FF7200;">ụ</span>
            <span style="color: #C3FF00;">H</span><span style="color: #5DFF00;">u</span><span style="color: #00FF1D;">y</span><span style="color: #00FFF4;">n</span><span style="color: #00A3FF;">h: </span> 
            <span>Minh Chứ ai</span>
        </div>
        <div style="text-align: center;padding-top: 15px;padding-bottom:5px">
            <button class="chitiet">Xem Chi Tiết</button>
        </div>
    </div>

    <div class="the">  <img class="avatar" src="/images/hocba/avatar1.png"> 
        <div>
            <span style="color: #FF0059;">B</span><span style="color: #FE1300;">é: </span>
            <span>Nguyễn Bá Lĩnh</span>
        </div>
        <div>
            <span style="color: #FF0059;">N</span><span style="color: #FE1300;">g</span><span style="color: #FF7200;">à</span><span style="color: #C3FF00;">y</span>
            <span style="color: #5DFF00;">S</span><span style="color: #00FF1D;">i</span><span style="color: #00FFF4;">n</span><span style="color: #00A3FF;">h: </span> 
            <span>08/10</span>
        </div>
        <div>
            <span style="color: #FF0059;">L</span><span style="color: #FE1300;">ớ</span><span style="color: #FF7200;">p: </span>
            <span>Mầm Lá</span>
        </div>
        <div>
            <span style="color: #FF0059;">P</span><span style="color: #FE1300;">h</span><span style="color: #FF7200;">ụ</span>
            <span style="color: #C3FF00;">H</span><span style="color: #5DFF00;">u</span><span style="color: #00FF1D;">y</span><span style="color: #00FFF4;">n</span><span style="color: #00A3FF;">h: </span> 
            <span>Minh Chứ ai</span>
        </div>
        <div style="text-align: center;padding-top: 15px;padding-bottom:5px">
            <button class="chitiet">Xem Chi Tiết</button>
        </div>
    </div>
  
</body>
</html>
@endsection