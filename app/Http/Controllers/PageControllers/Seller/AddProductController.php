<?php

namespace App\Http\Controllers\PageControllers\Seller;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AddProductController extends Controller
{
    public function index() {
        return view("pages/seller/addProductPage");
    }
}
