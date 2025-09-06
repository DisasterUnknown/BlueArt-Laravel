<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\User;

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
        $product = User::find($id);
        if ($product) {
            $product->update(['status' => 'active']);
        }

        // Refresh products
        $this->kickedUsers = User::where('status', 'kicked')->get();
    }
    public function render()
    {
        return view('livewire.admin.view-kick-users');
    }
}
