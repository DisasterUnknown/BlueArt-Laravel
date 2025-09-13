<?php

namespace App\Http\Controllers\PageControllers\Common;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\BaseControllers\ManageRequestUnban;

class RequestUnban extends Controller
{
    public function index()
    {
        return view('auth.request-unban');
    }

    public function store(Request $request)
    {
        $controller = new ManageRequestUnban();
        return $controller->store($request);
    }
}
