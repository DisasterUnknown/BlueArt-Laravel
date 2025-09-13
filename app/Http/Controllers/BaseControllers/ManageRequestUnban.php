<?php

namespace App\Http\Controllers\BaseControllers;

use App\Models\UnbanRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ManageRequestUnban extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'message' => 'required|string|min:5|max:1000',
        ]);

        $existingRequest = UnbanRequest::where('email', $validated['email'])->latest()->first();

        if ($existingRequest) {
            if ($existingRequest->status === 'pending') {
                return redirect()->back()->with('error', 'Your last request is still in review process.');
            } elseif ($existingRequest->status === 'dismissed') {
                return redirect()->back()->with('error', 'Your previous unban request was dismissed. You can no longer submit a new request.');
            } else {
                return redirect()->back()->with('error', 'You already have an existing unban request.');
            }
        }

        UnbanRequest::create([
            'email' => $validated['email'],
            'message' => $validated['message'],
            'status' => 'pending',
        ]);

        return redirect()->back()->with('success', 'Your unban request has been submitted. Admins will review it shortly.');
    }
}
