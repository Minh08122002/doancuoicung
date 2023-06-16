@section('title', 'Liên hệ')
@extends('layouts.headerfooter')
@section('content')
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ url('/css/user/home.css') }}">
    <link rel="stylesheet" href="{{ url('/css/user/lienhe.css') }}">
    <title>Liên hệ</title>
</head>

    <div>
    <span ><img style="width: 200px;height: 80px;padding-top: 30px;padding-left:10%" src="/images/lienhe/telephone.png"></span>
    <span style="font-size:25px;font-weight:bold">Liên Hệ</span>
    <hr style="border:2px solid;width:75%">
    </div>

        <table class="table3"  style="margin-top: 30px;margin-right:10%;border: 2px solid;">
            <tr>
                <td class="td3" style="text-align: center;font-weight:bold;color:white;background-color: #009900;border:2px;padding: 1.5em;">TRƯỜNG MẦM NON BÉ NA</td>
            </tr>
            <tr>
                <td class="td3" style="border-top:solid;  padding: 5.5em;"> 
                <div class="text">QUÝ PHỤ HUYNH VUI LÒNG NHẬP EMAIL ĐỂ ĐƯỢC TƯ VẤN VÀ HỖ TRỢ</div>
                    <div class="nhapmail" style="text-align: center;">
                        <input name="" class="nhap" placeholder="Email">
                    </div>
                    <div style="text-align: center;padding-top: 20px;">
                        <button class="dongy">ĐỒNG Ý</button>
                    </div>
                </td>
            </tr>
        </table>

</html>
@endsection