<?php

namespace App\Http\Controllers\PageControllers\Costomer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CartController extends Controller
{
    public function index() {
        return view("pages/costomer/cartPage");
    }
}
