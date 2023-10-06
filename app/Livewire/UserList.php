<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use Livewire\WithPagination;
//use Livewire\Attributes\On;
//use Livewire\Attributes\Computed;

class UserList extends Component
{
	use WithPagination;

	public $search;

	public $selectedUser;

    public function mount()
    {
        $this->selectedUser = null; // Initialize the modal state
    }

	public function viewUser(User $user)	
	{
		$this->selectedUser = $user;

		$this->dispatch('open-modal', name: 'user-details');
	}

    public function render()
    {
		$users = User::latest()->where('name', 'like', "%$this->search%")->paginate(5);

		$view_params = [
			'users' => $users
		];

        return view('livewire.user-list', $view_params);
    }
}
