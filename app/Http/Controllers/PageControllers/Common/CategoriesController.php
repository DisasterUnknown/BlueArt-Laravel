<?php

namespace App\Http\Controllers\PageControllers\Common;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoriesController extends Controller
{
    public function index($category) {
        return view("pages/common/categoriesPage", compact('category'));
    }
}
