<?php

namespace App\Http\Controllers\PageControllers\Costomer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\BaseControllers\SaleController;

class CheckOutController extends Controller
{
    public function index()
    {
        return view("pages/costomer/checkOutPage");
    }

    public function checkOut(Request $request)
    {
        if ($request->phoneNumber == null) {
            return redirect()->back()->with('error', 'Phone number is required')->withInput();
        } else if ($request->address == null) {
            return redirect()->back()->with('error', 'Address is required')->withInput();
        } else if ($request->shipingMethod == null) {
            return redirect()->back()->with('error', 'Shipping method is required')->withInput();
        } else if ($request->cardHolderName == null) {
            return redirect()->back()->with('error', 'Card holder name is required')->withInput();
        } else if ($request->cardNumber == null) {
            return redirect()->back()->with('error', 'Card number is required')->withInput();
        } else if ($request->CVC == null) {
            return redirect()->back()->with('error', 'CVC is required')->withInput();
        } else {
            $controller = new SaleController();
            return $controller->store($request);
        }
    }
}
