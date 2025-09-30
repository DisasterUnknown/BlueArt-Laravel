<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\RequestUnbanProduct;

class ViewUnbanProductRequest extends Component
{
    public $requests;

    public function mount()
    {
        $this->loadRequests();
    }

    public function loadRequests()
    {
        $this->requests = RequestUnbanProduct::with(['product', 'user'])
            ->where('status', 'pending')
            ->get();
    }

    public function approve($requestId)
    {
        $request = RequestUnbanProduct::find($requestId);

        if ($request && $request->product) {
            // Update product status to active
            $request->product->update(['status' => 'active']);

            // Mark request as approved
            $request->update(['status' => 'approved']);

            $this->loadRequests();
        }
    }

    public function dismiss($requestId)
    {
        $request = RequestUnbanProduct::find($requestId);

        if ($request && $request->product) {
            // Keep product status as is
            $request->update(['status' => 'dismissed']);

            $this->loadRequests();
        }
    }

    public function render()
    {
        return view('livewire.admin.view-unban-product-request');
    }
}
