<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- link icon -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
        <script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>
        <!-- link css -->
        <link rel="stylesheet" href="{{ url('/css/layout.css')}}">
        <title>@yield('title')</title>
        <style>
          .underline{
            border-bottom: 1px solid rgba(0, 0, 0, 0.23);
            display: flex;
            align-items: center;
            padding-left: 10px;
          }
          .underline i{
            margin-right: 10px;
          }
          .border-right{
            border-right: 1px solid rgba(0, 0, 0, 0.23);
          }
        </style>
        
    </head>
    <body>
        <header>
        </header>
        <!-- The sidebar -->
            <div class="sidebar" style=" left: 0px; top: 0px; ">
                <div class="card-container">
                    <div class="card">
                    @if ($avatarUrl == Null)
                      <img src="{{asset('images/avatar.jpg')}}" alt="photo" style="width: 60px; display: block;width: 50px;height: 50px;border-radius: 50%; margin-right: 10px;">
                    @else
                      <img src="{{  $avatarUrl }}" alt="photo" style="width: 60px; display: block;width: 50px;height: 50px;border-radius: 50%; margin-right: 10px;">
                    @endif
                      <div class="card-content">
                        <h2 class="card-title">{{ session('name') }}</h2>
                        <p class="card-description">{{ session('email') }}</p>
                      </div>
                    </div>
                </div>
                <div class="dropdown">
                  <button class="dropdown-button">
                    <i class="fas fa-cog"></i>
                    <i>Quản lí tài khoản</i>
                    <i class="fas fa-chevron-down"></i>
                  </button>
                  <div class="dropdown-menu">
                    <ul>
                      <li><a href="{{route('admin.tai-khoan.index')}}">Danh sách tài khoản</a></li>
                      <li><a href="{{route('admin.tai-khoan.show-them-tai-khoan')}}">Thêm tài khoản</a></li>
                    </ul>
                  </div>
                </div>
                <div class="dropdown">
                  <button class="dropdown-button">
                    <i class="fas fa-cog"></i>
                    <i>Quản lí email</i>
                    <i class="fas fa-chevron-down"></i>
                  </button>
                  <div class="dropdown-menu">
                    <ul>
                      <li><a href="#">General</a></li>
                      <li><a href="#">Profile</a></li>
                      <li><a href="#">Security</a></li>
                    </ul>
                  </div>
                </div>
                <div class="dropdown">
                  <button class="dropdown-button">
                    <i class="fas fa-cog"></i>
                    <i>Quản lí lớp học</i>
                    <i class="fas fa-chevron-down"></i>
                  </button>
                  <div class="dropdown-menu">
                    <ul>
                      <li><a href="#">General</a></li>
                      <li><a href="#">Profile</a></li>
                      <li><a href="#">Security</a></li>
                    </ul>
                  </div>
                </div>
                <div class="dropdown">
                  <button class="dropdown-button">
                    <i class="fas fa-cog"></i>
                    <i>Quản lí môn học</i>
                    <i class="fas fa-chevron-down"></i>
                  </button>
                  <div class="dropdown-menu">
                    <ul>
                      <li><a href="#">General</a></li>
                      <li><a href="#">Profile</a></li>
                      <li><a href="#">Security</a></li>
                    </ul>
                  </div>
                </div>
                <div class="dropdown">
                  <button class="dropdown-button">
                    <i class="fas fa-cog"></i>
                    <i>Quản lí điểm số</i>
                    <i class="fas fa-chevron-down"></i>
                  </button>
                  <div class="dropdown-menu">
                    <ul>
                      <li><a href="#">General</a></li>
                      <li><a href="#">Profile</a></li>
                      <li><a href="#">Security</a></li>
                    </ul>
                  </div>
                </div>
                <div class="dropdown">
                  <button class="dropdown-button">
                    <i class="fas fa-cog"></i>
                    <i>Quản lí bài đăng</i>
                    <i class="fas fa-chevron-down"></i>
                  </button>
                  <div class="dropdown-menu">
                    <ul>
                      <li><a href="#">Bài đăng</a></li>
                      <li><a href="#">Loại bài đăng</a></li>
                      <li><a href="{{route('admin.loai-bai-dang-con.index')}}">Loại bài đăng con</a></li>
                    </ul>
                  </div>
                  <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit">Đăng xuất</button>
              </form>
                </div>
              </div>
            <!-- Page content -->
            <div class="content">
                <header class="underline" >
                  <i class="fas fa-arrow-alt-circle-left"></i>
                  <h3 class="border-right" style="width: 138px;">vào trang chủ</h3>
                </header>
                @yield('content')
            </div>
        <footer>
        </footer>
        <script>
            const dropdownButtons = document.querySelectorAll('.dropdown-button');
            dropdownButtons.forEach(function(button) {
              button.addEventListener('click', function() {
                const dropdownMenu = button.nextElementSibling;
                dropdownMenu.classList.toggle('show');
              });
            });
          </script>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
          <script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>
          <script>
          CKEDITOR.replace( '' );
          </script>
    </body>
</html>