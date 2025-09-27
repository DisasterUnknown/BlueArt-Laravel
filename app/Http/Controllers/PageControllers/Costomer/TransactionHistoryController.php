<?php

namespace App\Http\Controllers\PageControllers\Costomer;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Sale;

class TransactionHistoryController extends Controller
{
    public function index()
    {
        $userId = Auth::id();

        $transactionHistory = Sale::with('product')
            ->where('customerID', $userId)
            ->orderBy('salesDateTime', 'desc')
            ->get();

        return view('pages.costomer.transactionHistoryPage', compact('transactionHistory'));
    }
}
