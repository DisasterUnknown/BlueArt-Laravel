<?php

namespace App\Http\Controllers\PageControllers\Costomer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CheckOutController extends Controller
{
    public function index() {
        return view("pages/costomer/checkOutPage");
    }
}
