<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\User;
use App\Models\Product;

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
        $user = User::find($id);
        if ($user) {
            $user->update(['status' => 'kicked']);
        }

        if ($user->role === 'seller') {
            Product::where('user_id', $user->id)->update(['status' => 'banned']);
        }

        // Refresh products
        $this->activeUsers = User::where('status', 'active')->where('role', '!=', 'admin')->get();
    }

    public function render()
    {
        return view('livewire.admin.view-users');
    }
}
