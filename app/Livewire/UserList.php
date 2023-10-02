<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;

class UserList extends Component
{
	public $search;

    public function render()
    {
		$users = User::latest()->where('name', 'like', "%$this->search%")->paginate(5);

		$view_params = [
			'users' => $users
		];

        return view('livewire.user-list', $view_params);
    }
}
