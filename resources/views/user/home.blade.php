
<!---->

@section('title', 'Trang chủ')
@extends('layouts.headerfooter')
@section('content')


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="{{ url('/css/user/home.css') }}">

    </head>
    <body>
 
        <div class="display-container" style="margin-top:10px;margin-left:2.5%;margin-right:2.5%;"> 
            <img class="mySlides3" src="/images/bannerhome/banner1.png"> 
            <img class="mySlides3" src="/images/bannerhome/banner2.png"> 
            <img class="mySlides3" src="/images/bannerhome/banner3.png"> 
            <button class="image-button button-left" onclick="plusDivs(-1)">&#10094;</button> 
            <button class="image-button button-right" onclick="plusDivs(1)">&#10095;</button> 
            <div class="badge" style="width:100%"> 
            <span class="image-badge" onclick="currentDiv(1)"></span>
            <span class="image-badge" onclick="currentDiv(2)"></span> 
            <span class="image-badge" onclick="currentDiv(3)"></span> 
        </div> 
    </div> 
    <script> var slideIndex = 1; showDivs(slideIndex); function plusDivs(n) { showDivs(slideIndex += n); } function currentDiv(n) { showDivs(slideIndex = n); } function showDivs(n) { var i; var x = document.getElementsByClassName("mySlides3"); var dots = document.getElementsByClassName("image-badge"); if (n > x.length) {slideIndex = 1} if (n < 1) {slideIndex = x.length} for (i = 0; i < x.length; i++) { x[i].style.display = "none"; } for (i = 0; i < dots.length; i++) { dots[i].className = dots[i].className.replace(" badge-white", ""); } x[slideIndex-1].style.display = "block"; dots[slideIndex-1].className += " badge-white"; }
     </script>

        <table class="table1"  style="margin-top: 30px;margin-left:10%">
            <tr>
                <td class="td1" style="text-align: center;font-weight:bold">THÔNG BÁO</td>
            </tr>
            <tr>
                <td class="td1">tb1</td>
            </tr>
            <tr>
                <td class="td1">tb2</td>
            </tr>
            <tr>
                <td class="td1">tb3</td>
            </tr>
            <tr>
                <td class="td1">tb4</td>
            </tr>
            <tr>
                <td class="td1">tb5</td>
            </tr>
            <tr>
                <td class="td1">tb6</td>
            </tr>
            <tr>
                <td class="td1">tb7</td>
            </tr>
            <tr>
                <td class="td1">tb7</td>
            </tr>
            <tr>
                <td class="td1">tb7</td>
            </tr>
            <tr >
                <td class="td1" style="text-align: center;font-weight:bold">1 2 3 4 5 6 trang</td>
            </tr>
        </table>
        
        <table class="table2"  style="margin-top: 30px;margin-right:10%;border: 2px solid;border-radius:30px">
            <tr>
                <td class="td2" style="text-align: center;font-weight:bold;color:white;background-color: #ED0004;border:2px;padding:1em">HOẠT ĐỘNG</td>
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
            <tr>
                <td class="td2" style="border-top:dotted">tb4</td>
            </tr>
            <tr >
                <td class="td2" style="text-align: center;font-weight:bold;border-top:dotted">1 2 3 4 5 6 trang</td>
            </tr>
        </table>
        <table class="table2"  style="margin-top: 30px;margin-right:10%;border: 2px solid;">
            <tr>
                <td class="td2" style="text-align: center;font-weight:bold;color:white;background-color: #EDE900;border:2px;padding:1em">CÔNG VĂN</td>
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
            <tr>
                <td class="td2" style="border-top:dotted">tb4</td>
            </tr>
            <tr >
                <td class="td2" style="text-align: center;font-weight:bold;border-top:dotted">1 2 3 4 5 6 trang</td>
            </tr>
        </table>
        <table class="table3"  style="margin-top: 30px;margin-right:10%;border: 2px solid;">
            <tr>
                <td class="td3" style="text-align: center;font-weight:bold;color:white;background-color: #0009B8;border:2px;padding: 1.5em;">CẢM NHẬN CỦA PHỤ HUYNH</td>
            </tr>
            <tr>
                <td class="td3" style="border-top:solid;  padding: 5.5em;">tb1</td>
            </tr>
        </table>

    </body>

    
</html>


@endsection

