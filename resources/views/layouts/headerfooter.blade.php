<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="{{ url('/css/headerfooter.css') }}">
        <title>@yield('title')</title>
    </head>
<body>
	<header class="header">
		<div class="inner">
			<div class="logo"><img style="margin-left:20px;width: 80px;height: 80px;" src="/image/LOGOn.png"></div>
			<div class="burger"></div>
			    <div id="menu">
                    <ul class="dropdown">
                        <li >
				            <button >
                                <a style="color:#1A9317;font-weight: bold;" class="active" href="#">GIỚI THIỆU</a>
                            </button>
                        </li>
                        <ul class="dropdown-content">
                            <li>GIỚI THIỆU NHÀ TRƯỜNG</li>
                            <li>CƠ CẤU TỔ CHỨC</li>
                            <li>LIÊN HỆ</li>
                        </ul>
                    </ul>
                    <ul class="dropdown">
                        <li >
				            <button >
                                <a style="color:#1A9317;font-weight: bold;" class="active" href="#">TIN TỨC</a>
                            </button>
                        </li>
                        <ul class="dropdown-content">
                            <li>TIN TỨC</li>
                        </ul>
                    </ul>
                    <ul class="dropdown">
                        <li >
				            <button >
                                <a style="color:#1A9317;font-weight: bold;" class="active" href="#">HOẠT ĐỘNG</a>
                            </button>
                        </li>
                        <ul class="dropdown-content">
                            <li>HOẠT ĐỘNG</li>
                        </ul>
                    </ul>
                    <ul class="dropdown">
                        <li >
				            <button >
                                <a style="color:#1A9317;font-weight: bold;" class="active" href="#">CÔNG VĂN</a>
                            </button>
                        </li>
                        <ul class="dropdown-content">
                            <li>CÔNG VĂN</li>
                        </ul>
                    </ul>
                    <ul class="dropdown">
                        <li >
				            <button >
                                <a style="color:#1A9317;font-weight: bold;" class="active" href="#">ẢNH</a>
                            </button>
                        </li>
                        <ul class="dropdown-content">
                            <li>ẢNH</li>
                        </ul>
                    </ul>
                    <ul class="dropdown">
                        <li >
				            <button >
                                <a style="color:#1A9317;font-weight: bold;" class="active" href="#">HỌC BẠ</a>
                            </button>
                        </li>
                        <ul class="dropdown-content">
                            <li>HỌC BẠ</li>
                        </ul>
                    </ul>
                    <ul class="dropdown">
                        <li >
				            <button >
                                <a style="color:#1A9317;font-weight: bold;" class="active" href="#">QUẢN TRỊ</a>
                            </button>
                        </li>
                        <ul class="dropdown-content">
                            <li>QUẢN TRỊ</li>
                        </ul>
                    </ul>  
                </div>
		</div>
        <hr>
        <div class="banner"><img style="width: 1100px;height: 130px;" src="/image/banner.png"></div>
	</header>
    <!-- content -->
    @yield('content')
    <!-- kết thúc -->
    <footer class="footer">
    <div class="waves">
      <div class="wave" id="wave1"></div>
      <div class="wave" id="wave2"></div>
      <div class="wave" id="wave3"></div>
      <div class="wave" id="wave4"></div>
    </div>
    <ul class="social-icon">
      <li class="social-icon__item"><a class="social-icon__link" href="#">
          <ion-icon name="logo-facebook"></ion-icon>
        </a></li>
      <li class="social-icon__item"><a class="social-icon__link" href="#">
          <ion-icon name="logo-twitter"></ion-icon>
        </a></li>
      <li class="social-icon__item"><a class="social-icon__link" href="#">
          <ion-icon name="logo-linkedin"></ion-icon>
        </a></li>
      <li class="social-icon__item"><a class="social-icon__link" href="#">
          <ion-icon name="logo-instagram"></ion-icon>
        </a></li>
    </ul>
    <ul class="menu">
      
        <li class="menu__item"><a class="menu__link"  href="#">HỖ TRỢ</a></li>
        <ul>
          <li style="color:white;margin-left:10px">Email : mamnonbena@gmail.com</li>
          <li style="color:white;margin-left:10px">Hotline : 0933333333</li>
        </ul>
      
      
        <li class="menu__item"><a class="menu__link" href="#">TÌM KIẾM</a></li>
        <ul>
          <div class="box">
            <div class="container-1">
              <span class="icon"><i class="fa fa-seach"></i></span>
             <input type="search" id="search" placeholder="Search..." />
            </div>
          </div>
        </ul>
    </ul>
    <p>2023 WEBSITE TRƯỜNG MẦN NON | PHÁT TRIỂN BỞI SINH VIÊN CAO THẮNG</p>
  </footer>




  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
  </body>
