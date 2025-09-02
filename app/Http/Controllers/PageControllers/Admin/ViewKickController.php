<?php

namespace App\Http\Controllers\PageControllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ViewKickController extends Controller
{
    public function index() {
        return view("pages/admin/viewKickUsers");
    }
}
