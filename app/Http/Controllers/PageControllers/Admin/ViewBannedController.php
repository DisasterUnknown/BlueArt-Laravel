<?php

namespace App\Http\Controllers\PageControllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ViewBannedController extends Controller
{
    public function index() {
        return view("pages/admin/viewBannedProducts");
    }
}
