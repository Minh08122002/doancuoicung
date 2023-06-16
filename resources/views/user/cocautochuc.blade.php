@section('title', 'Cơ Cấu Tổ Chức')
@extends('layouts.headerfooter')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ url('/css/user/congvan.css') }}">
    
</head>
<body>
<div>
    <span ><img style="width: 220px;height: 80px;padding-top: 30px;padding-left:10%" src="/images/cocautochuc/cocau.png"></span>
    <span style="font-size:25px;font-weight:bold">CƠ CẤU TỔ CHỨC</span>
    <hr style="border:2px solid;width:75%">
    </div>
<table class="table1"  style="margin-top: 30px;margin-right:10%;border: 2px solid;border-radius:30px">
            <tr>
                <td class="td1" style="text-align: center;font-weight:bold;color:white;background-color: #FFCC00;border:2px;padding:1em;border-radius:30px 30px 0px 0px">CƠ CẤU TỔ CHỨC</td>
            </tr>
            <tr>
                <td class="td1" style="border-top:solid">tb1</td>
            </tr>
            <tr>
                <td class="td1" style="border-top:dotted">tb2</td>
            </tr>
            <tr>
                <td class="td1" style="border-top:dotted">tb3</td>
            </tr>
            <tr>
                <td class="td1" style="border-top:dotted">tb4</td>
            </tr>
            <tr>
                <td class="td1" style="border-top:dotted">tb4</td>
            </tr>
            <tr>
                <td class="td1" style="border-top:dotted">tb4</td>
            </tr>
            <tr>
                <td class="td1" style="border-top:dotted">tb4</td>
            </tr>
            <tr>
                <td class="td1" style="border-top:dotted">tb4</td>
            </tr>
            <tr >
                <td class="td1" style="text-align: center;font-weight:bold;border-top:dotted">1 2 3 4 5 6 trang</td>
            </tr>
    </table>

    <table class="table2"  style="margin-top: 30px;margin-right:10%;border: 2px solid;border-radius:30px">
            <tr>
                <td class="td2" style="text-align: center;font-weight:bold;color:white;background-color: #00FF00;border:2px;padding:1em;border-radius:30px 30px 0px 0px">THÔNG BÁO</td>
            </tr>
            <tr>
                <td class="td2" style="border-top:solid">tb1</td>
            </tr>
            <tr>
                <td class="td2" style="border-top:dotted">tb2</td>
            </tr>
            <tr>
                <td class="td2" style="border-top:dotted">tb3</td>
            </tr>
            <tr >
                <td class="td2" style="border-top:dotted"></td>
            </tr>
        </table>

        <table class="table2"  style="margin-top: 30px;margin-right:10%;border: 2px solid;border-radius:30px">
            <tr>
                <td class="td2" style="text-align: center;font-weight:bold;color:white;background-color: #FF6666;border:2px;padding:1em;border-radius:30px 30px 0px 0px">HOẠT ĐỘNG</td>
            </tr>
            <tr>
                <td class="td2" style="border-top:solid">tb1</td>
            </tr>
            <tr>
                <td class="td2" style="border-top:dotted">tb2</td>
            </tr>
            <tr>
                <td class="td2" style="border-top:dotted">tb3</td>
            </tr>
            <tr >
                <td class="td2" style="border-top:dotted"></td>
            </tr>
        </table>
</body>
</html>
@endsection