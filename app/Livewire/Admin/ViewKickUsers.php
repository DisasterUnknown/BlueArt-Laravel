<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\User;
use App\Models\Product;

class ViewKickUsers extends Component
{
    public $kickedUsers;

    public function mount()
    {
        $this->kickedUsers = User::where('status', 'kicked')
            ->latest()
            ->get();
    }

    public function restoreUser($id)
    {
        $user = User::find($id);
        if ($user) {
            $user->update(['status' => 'active']);
        }

        if ($user->role === 'seller') {
            Product::where('user_id', $user->id)->update(['status' => 'active']);
        }

        // Refresh products
        $this->kickedUsers = User::where('status', 'kicked')->get();
    }
    public function render()
    {
        return view('livewire.admin.view-kick-users');
    }
}
