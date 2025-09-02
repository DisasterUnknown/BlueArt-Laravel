<?php

namespace App\Http\Controllers\PageControllers\Common;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Page404Controller extends Controller
{
    public function index() {
        return view("pages/common/page404");
    }
}
