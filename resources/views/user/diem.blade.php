@section('title', 'Điểm')
@extends('layouts.headerfooter')
@section('content')
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="{{ url('/css/user/diem.css') }}">
  
</head>

    <div>
    <span ><img style="width: 200px;height: 80px;padding-top: 30px;padding-left:10%" src="/images/diem/point.png"></span>
    <span style="font-size:25px;font-weight:bold">ĐIỂM</span>
    <hr style="border:2px solid;width:75%">
    </div>

    <table class="mon" >
         <tr>
            <td>Môn</td>
        </tr>
        <tr>
            <td>Môn1</td>
        </tr>
        <tr>
            <td>Môn2</td>
        </tr>
        <tr>
            <td>Môn3</td>
        </tr>
        <tr>
            <td>Môn4</td>
        </tr>
    </table>
    <table class="heso" >
        <tr>
            <td>MIỆNG</td>
            <td>KIỂM TRA</td>
            <td>THI</td>
        </tr>
        
    </table>
    <table class="diem" >
        <tr>
            <td>4</td>
            <td>5</td>
            <td>9</td>
        </tr>
        <tr>
            <td style="border-top: 3px solid #CCCC00;">TỐT</td>
            <td style="border-top: 3px solid #444444;">KHÁ</td>
            <td style="border-top: 3px solid #33CC00;">TB</td>
        </tr>
        <tr>
            <td style="border-top: 3px solid #AA0000;">TÓT</td>
            <td style="border-top: 3px solid #FF6600;">TB</td>
            <td style="border-top: 3px solid #003366; ">TỐT</td>
        </tr>
        <tr>
            <td style="border-top: 3px solid #0000BB;">KHÁ</td>
            <td style="border-top: 3px solid #00AA00;">KHÁ</td>
            <td style="border-top: 3px solid #990099;">KHÁ</td>
        </tr>
    </table>

    <table class="trungbinh" >
        <tr>
            <td>TRUNG BÌNH</td>
        </tr>
        <tr>
            <td>TỐT</td>
        </tr>
        <tr>
            <td>KHÁ</td>
        </tr>
        <tr>
            <td>TỐT</td>
        </tr>
        <tr>
            <td>TỐT</td>
        </tr>
    </table>

    <table class="tong" >
        <tr>
            <td>HẠNH KIỂM:</td>
            <td>KHÁ</td>
            <td>XẾP LOẠI:</td>
            <td>TỐT</td>
            <td>TỔNG:</td>
            <td>TỐT</td>
        </tr>
    </table>

    <img style="width: 200px;height: 80px;margin-left:300px" src="/images/diem/stars.png">
</html>
@endsection