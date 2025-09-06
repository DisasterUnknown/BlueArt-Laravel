<?php

namespace App\Http\Controllers\BaseControllers;

use App\Models\Sale;
use App\Models\Product;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Models\Mongo\UserCart;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class SaleController extends Controller
{
    public function create()
    {
        $products = Product::all();
        $customers = Customer::all();
        return view('sale.create', compact('products', 'customers'));
    }

    public function store(Request $request)
    {
        // Remove spaces
        $request->merge([
            'cardNumber' => str_replace(' ', '', $request->cardNumber),
            'CVC' => str_replace(' ', '', $request->CVC),
        ]);

        // Validate
        $validator = Validator::make($request->all(), [
            'phoneNumber' => 'required|string|max:15',
            'address' => 'required|string',
            'shipingMethod' => 'required|string|max:50',
            'cardHolderName' => 'required|string|max:100',
            'cardNumber' => 'required|numeric|digits_between:12,19',
            'CVC' => 'required|numeric|digits_between:3,4',
        ]);

        if ($validator->fails()) {
            dd($request->all(), $validator->errors());
        }

        $validated = $validator->validated();

        $userId = Auth::id();
        if (!$userId) {
            return redirect()->back()->with('error', 'You must be logged in to complete checkout.')->withInput();
        }

        // Get cart MongoDB
        $cart = UserCart::where('user_id', $userId)->first();
        if (!$cart || empty($cart->product_id)) {
            return redirect()->back()->with('error', 'Your cart is empty.')->withInput();
        }

        $productsArray = $cart->product_id;
        if (is_string($productsArray)) {
            $productsArray = json_decode($productsArray, true) ?? [];
        }

        if (empty($productsArray)) {
            return redirect()->back()->with('error', 'Your cart is empty.')->withInput();
        }

        // Save sales in MySQL
        foreach ($productsArray as $item) {
            $product = Product::find($item['id']);
            if (!$product) {
                continue; // skip missing products
            }

            $quantity = (int) ($item['quantity'] ?? 1);
            $price = $product->price - (($product->price / 100) * $product->discount);
            $amount = $price * $quantity;

            try {
                Sale::create([
                    'product_id' => $product->id,
                    'customerID' => (string) $userId,
                    'salesDateTime' => now(),
                    'amount' => $amount,
                    'phoneNumber' => $validated['phoneNumber'],
                    'address' => $validated['address'],
                    'shippingMethod' => $validated['shipingMethod'],
                ]);
            } catch (\Exception $e) {
                dd("Sale insert failed:", $e->getMessage(), $amount, $product->id);
            }
        }

        // Clear cart
        $cart->product_id = [];
        $cart->save();

        return redirect()->route('checkOutPage')->with('success', 'Purchase completed successfully!');
    }


    public function show($id)
    {
        $sale = Sale::with('product', 'customer')->findOrFail($id);
        return view('sale.show', compact('sale'));
    }

    public function edit($id)
    {
        $sale = Sale::findOrFail($id);
        $products = Product::all();
        $customers = Customer::all();
        return view('sale.edit', compact('sale', 'products', 'customers'));
    }

    public function update(Request $request, $id)
    {
        $sale = Sale::findOrFail($id);
        $validated = $request->validate([
            'product_id' => 'nullable|string|max:10',
            'customerID' => 'nullable|string|max:10',
            'salesDateTime' => 'nullable|date',
            'amount' => 'nullable|numeric',
            'phoneNumber' => 'nullable|string|max:15',
            'address' => 'nullable|string',
            'shippingMethod' => 'nullable|string|max:50'
        ]);
        $sale->update($validated);
        return redirect()->route('sales.index')->with('success', 'Sale updated');
    }

    public function destroy($id)
    {
        $sale = Sale::findOrFail($id);
        $sale->delete();
        return redirect()->route('sales.index')->with('success', 'Sale deleted');
    }
}
