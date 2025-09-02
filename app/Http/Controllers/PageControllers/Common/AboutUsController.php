<?php

namespace App\Http\Controllers\PageControllers\Common;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AboutUsController extends Controller
{
    public function index() {
        return view("pages/common/aboutUsPage");
    }
}
