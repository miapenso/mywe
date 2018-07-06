<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function __construct(){}
    public function index()
    {
        return 'home_home';
    }
    public function test()
    {
        return 'home_test';
    }
}
