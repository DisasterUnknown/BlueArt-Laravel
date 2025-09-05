<?php

namespace App\Http\Controllers\PageControllers\Common;

use App\Http\Controllers\Controller;

class Page403Controller extends Controller
{
    public function index()
    {
        return view('pages.common.page403');
    }
}
