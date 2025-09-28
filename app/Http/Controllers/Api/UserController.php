<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Update the authenticated user's name and profile picture.
     */
    public function updateProfile(Request $request)
    {
        $user = $request->user();

        // Validation
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:100',
            'pFPdata' => 'nullable|string', // base64 string
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ], 422);
        }

        // Update name
        $user->name = $request->name;

        // Update profile picture if provided
        if ($request->has('pFPdata') && !empty($request->pFPdata)) {
            $user->pFPdata = $request->pFPdata;
        }

        $user->save();

        return response()->json([
            'message' => 'Profile updated successfully',
            'user' => $user
        ]);
    }
}
