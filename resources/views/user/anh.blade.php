@section('title', 'Ảnh')
@extends('layouts.headerfooter')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ url('/css/user/anh.css') }}">
    
</head>
<body>
<div>
    <span ><img style="width: 220px;height: 80px;padding-top: 30px;padding-left:10%" src="/images/anh/camera.png"></span>
    <span style="font-size:25px;font-weight:bold">Ảnh</span>
    <hr style="border:2px solid;width:75%">
    </div>
<table class="table1"  style="margin-top: 30px;margin-right:10%;border: 2px solid;border-radius:30px">
            <tr>
                <td class="td1" style="text-align: center;font-weight:bold;color:white;background-color: #33CC66;border:2px;padding:1em;border-radius:30px 30px 0px 0px">ẢNH</td>
            </tr>
            <tr>
                <td class="td1" style="border-top:solid">
                    <div class="chinhanh">
                        <img class="anh" src="/images/hocba/avatar1.png" onclick="zoomImage(this)">
                        <div id="overlay"></div>
                        <br/>
                        <figurecaption style="font-size: 12px;"><i>ẢNH LĨNH NÈ</i></figurecaption>
                    </div>

                    <div class="chinhanh">
                        <img class="anh" src="/images/hocba/avatar1.png">
                        <br/>
                        <figurecaption style="font-size: 12px;"><i>ẢNH LĨNH NÈ</i></figurecaption>
                    </div>

                    <div class="chinhanh">
                        <img class="anh" src="/images/hocba/avatar1.png">
                        <br/>
                        <figurecaption style="font-size: 12px;"><i>ẢNH LĨNH NÈ</i></figurecaption>
                    </div>

                    <div class="chinhanh">
                        <img class="anh" src="/images/hocba/avatar1.png">
                        <br/>
                        <figurecaption style="font-size: 12px;"><i>ẢNH LĨNH NÈ</i></figurecaption>
                    </div>

                    <div class="chinhanh">
                        <img class="anh" src="/images/anh/camera.png" onclick="zoomImage(this)">
                        <div id="overlay"></div>
                        <br/>
                        <figurecaption style="font-size: 12px;"><i>ẢNH LĨNH NÈ</i></figurecaption>
                    </div>

                    <div class="chinhanh">
                        <img class="anh" src="/images/anh/camera.png">
                        <br/>
                        <figurecaption style="font-size: 12px;"><i>ẢNH LĨNH NÈ</i></figurecaption>
                    </div>

                    <div class="chinhanh">
                        <img class="anh" src="/images/hocba/avatar1.png">
                        <br/>
                        <figurecaption style="font-size: 12px;"><i>ẢNH LĨNH NÈ</i></figurecaption>
                    </div>

                    <div class="chinhanh">
                        <img class="anh" src="/images/hocba/books.png">
                        <br/>
                        <figurecaption style="font-size: 12px;"><i>ẢNH LĨNH NÈ</i></figurecaption>
                    </div>

                    <div class="chinhanh">
                        <img class="anh" src="/images/hoatdong/hoatdong.png">
                        <br/>
                        <figurecaption style="font-size: 12px;"><i>ẢNH LĨNH NÈ</i></figurecaption>
                    </div>

                    <div class="chinhanh">
                        <img class="anh" src="/images/hocba/avatar1.png">
                        <br/>
                        <figurecaption style="font-size: 12px;"><i>ẢNH LĨNH NÈ</i></figurecaption>
                    </div>
                </td>
            </tr>
            
            <tr >
                <td class="td1" style="text-align: center;font-weight:bold;border-top:dotted;margin-top:20px">1 2 3 4 5 6 trang</td>
            </tr>
    </table>
    <script src="/js/anh.js"></script>
</body>
</html>
@endsection