<?php

namespace App\Http\Controllers\PageControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SellerShopController extends Controller
{
    public function index() {
        return view("pages/sellerShop");
    }
}
