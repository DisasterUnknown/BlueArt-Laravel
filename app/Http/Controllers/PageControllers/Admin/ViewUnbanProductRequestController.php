<?php

namespace App\Http\Controllers\PageControllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ViewUnbanProductRequestController extends Controller
{
    public function index()
    {
        return view('pages.admin.viewUnbanProductRequest');
    }
} 
