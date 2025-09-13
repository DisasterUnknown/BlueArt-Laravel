<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\UnbanRequest;
use App\Models\User;

class ViewUnbanUserRequest extends Component
{
    public $requests;

    public function mount()
    {
        // Load all pending unban requests
        $this->requests = UnbanRequest::where('status', 'pending')->get();
    }

    public function restore($id)
    {
        $request = UnbanRequest::findOrFail($id);
        $user = User::where('email', $request->email)->first();

        if ($user) {
            $user->status = 'active'; 
            $user->save();

            $request->status = 'resolved'; 
            $request->save();

            session()->flash('success', "User {$user->name} restored successfully!");
        }

        $this->mount();
    }

    public function dismiss($id)
    {
        $request = UnbanRequest::findOrFail($id);
        $request->status = 'dismissed';
        $request->save();

        session()->flash('info', "Request dismissed.");
        $this->mount(); 
    }

    public function render()
    {
        return view('livewire.admin.view-unban-user-request');
    }
}
