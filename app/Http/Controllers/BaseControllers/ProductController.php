<?php

namespace App\Http\Controllers\BaseControllers;

use App\Models\Product;
use App\Models\Image;
use App\Models\Seller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|numeric|exists:users,id',
            'name' => 'required|string|max:25',
            'price' => ['required', 'regex:/^\d{1,3}(,\d{3})*(\.\d+)?$/'],
            'discount' => 'numeric|max:99.9',
            'category' => 'required|in:art,collectibles',
            'description' => 'string|max:1000',
            'mainImageBase64' => 'required|string',
            'image1Base64' => 'nullable|string',
            'image2Base64' => 'nullable|string',
            'image3Base64' => 'nullable|string',
            'image4Base64' => 'nullable|string',
        ]);

        $validated['price'] = str_replace(',', '', $validated['price']);

        DB::transaction(function () use ($validated) {
            $product = Product::create([
                'user_id' => $validated['user_id'],
                'name' => $validated['name'],
                'price' => $validated['price'],
                'discount' => $validated['discount'] ?? 0,
                'category' => $validated['category'],
                'description' => $validated['description'] ?? '',
            ]);

            $images = ['mainImageBase64', 'image1Base64', 'image2Base64', 'image3Base64', 'image4Base64'];
            foreach ($images as $index => $field) {
                if (!empty($validated[$field])) {
                    Image::create([
                        'product_id' => $product->id,
                        'content' => $validated[$field],
                        'level' => $index === 0 ? 'main' : 'sub',
                    ]);
                }
            }
        });

        return redirect()->route('pages.seller.sellerShop')
            ->with('success', 'Product added successfully!');
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|numeric|exists:users,id',
            'name' => 'required|string|max:25',
            'price' => ['required', 'regex:/^\d{1,3}(,\d{3})*(\.\d+)?$/'],
            'discount' => 'numeric|max:99.9',
            'category' => 'required|in:art,collectibles',
            'description' => 'string|max:1000',
            'mainImageBase64' => 'required|string',
            'image1Base64' => 'nullable|string',
            'image2Base64' => 'nullable|string',
            'image3Base64' => 'nullable|string',
            'image4Base64' => 'nullable|string',
        ]);

        $validated['price'] = str_replace(',', '', $validated['price']);

        DB::transaction(function () use ($validated, $request) {
            $product = Product::find($request['product_id']);
            $product->update([
                'user_id' => $validated['user_id'],
                'name' => $validated['name'],
                'price' => $validated['price'],
                'discount' => $validated['discount'] ?? 0,
                'category' => $validated['category'],
                'description' => $validated['description'] ?? '',
            ]);

            $images = ['mainImageBase64', 'image1Base64', 'image2Base64', 'image3Base64', 'image4Base64'];
            $imageIds = [
                $request['product_imgId'] ?? null,
                $request['product_imgId1'] ?? null,
                $request['product_imgId2'] ?? null,
                $request['product_imgId3'] ?? null,
                $request['product_imgId4'] ?? null
            ];

            foreach ($images as $index => $field) {
                $imgData = $request[$field] ?? null;
                $imgId = $imageIds[$index] ?? null;

                if ($imgData) {
                    if ($imgId) {
                        // Update existing image
                        $image = Image::find($imgId);
                        if ($image) {
                            $image->update([
                                'content' => $imgData,
                                'level' => $index === 0 ? 'main' : 'sub',
                            ]);
                        }
                    } else {
                        // Create new image
                        Image::create([
                            'product_id' => $product->id,
                            'content' => $imgData,
                            'level' => 'sub',
                        ]);
                    }
                }
            }
        });

        return redirect()->route('pages.seller.sellerShop')
            ->with('success', 'Product updated successfully!');
    }
}
