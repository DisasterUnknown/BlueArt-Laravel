<?php

namespace App\Http\Controllers\PageControllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ViewUnbanUserRequestController extends Controller
{
    public function index()
    {
        return view('pages.admin.viewUnbanUserRequest');
    }
}
