<?php

namespace App\Http\Livewire\Admin\Users;

use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;

class ListUsers extends Component
{
    public $state = [];
    public $showEditModal = false;
    public $user;
    public $userIdBeingRemoved = null;

    public function addNew()
    {
        $this->state = [];
        $this->showEditModal = false;
        $this->dispatchBrowserEvent('show-form');
    }
    public function createUser()
    {
        $validatedData = Validator::make( $this->state, [ 
            'name' => 'required',
             'email' => 'required|email|unique:users',
             'password' => 'required|confirmed',
              ]) -> validate();
        
        $validatedData['password'] = bcrypt( $validatedData['password'] );
        User::create($validatedData);
        //session()->flash('message', 'Felhasználót sikeresen hozzáadtam!');
        $this->dispatchBrowserEvent('hide-form', ['message' => 'User added succesfully!']);

        return redirect()->back();
    }

    public function edit( User $user )
    {
        $this->showEditModal = true;
        $this->user= $user;
        $this->state = $user->toArray();
        $this->dispatchBrowserEvent('show-form');
    }

    public function updateUser( User $user )
    {
        $validatedData = Validator::make( $this->state, [ 
            'name' => 'required',
             'email' => 'required|email|unique:users,email,'.$this->user->id,
             'password' => 'sometimes|confirmed',
              ]) -> validate();
        
        if(!empty($validatedData['password']) ){
            $validatedData['password'] = bcrypt( $validatedData['password'] );
        }
        
        $this->user->update($validatedData);
        $this->dispatchBrowserEvent('hide-form', ['message' => 'User updated succesfully!']);

        return redirect()->back();
    }

    public function confirmUserRemoval( $userId )
    {
        $this->userIdBeingRemoved = $userId;
        $this->dispatchBrowserEvent('show-delete-modal');
    }

    public function deleteUser( )
    {
        $user = User::findOrFail($this->userIdBeingRemoved);
        $user->delete();
        $this->dispatchBrowserEvent('hide-delete-modal', ['message' => 'User deleted succesfully!']);
    }



    public function render()
    {
        $users = User::latest()->paginate();
        return view('livewire.admin.users.list-users', ['users' => $users, ]);
    }
}
