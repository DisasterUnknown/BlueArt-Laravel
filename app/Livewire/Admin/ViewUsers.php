<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\User;

class ViewUsers extends Component
{
    public $activeUsers;

    public function mount()
    {
        $this->activeUsers = User::where('status', 'active')
            ->where('role', '!=', 'admin') 
            ->latest()
            ->get();
    }

    public function kickUser($id)
    {
        $product = User::find($id);
        if ($product) {
            $product->update(['status' => 'kicked']);
        }

        // Refresh products
        $this->activeUsers = User::where('status', 'active')->where('role', '!=', 'admin')->get();
    }

    public function render()
    {
        return view('livewire.admin.view-users');
    }
}
