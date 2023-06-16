<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function home()
    {
        return view('user.home');
    }
    public function anh()
    {
        return view('user.anh');
    }
    public function cocautochuc()
    {
        return view('user.cocautochuc');
    }
    public function congvan()
    {
        return view('user.congvan');
    }
    public function gioithieu()
    {
        return view('user.gioithieu');
    }
    public function hoatdong()
    {
        return view('user.hoatdong');
    }
    public function hocba()
    {
        return view('user.hocba');
    }
    public function lienhe()
    {
        return view('user.lienhe');
    }
    public function thongbao()
    {
        return view('user.thongbao');
    }
    public function thongbaocanhan()
    {
        return view('user.thongbaocanhan');
    }
    public function diem()
    {
        return view('user.diem');
    }
}
