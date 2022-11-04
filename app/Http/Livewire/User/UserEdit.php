<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Livewire\Component;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class UserEdit extends Component
{
    use LivewireAlert;
    public User $user;
    public $name='';
    public $surname='';
    public $email ='';
    public $password = '';
    public $password_confirmation = '';
    public $role;
    public $roles = [];

    protected function rules()
    {
        return [
            'name' => 'required|min:2|max:100',
            'surname' => 'required|min:2|max:100',
            'email' => ['required', 'email', Rule::unique('users','email')->ignore($this->user)],
        ];
    }

    public function mount()
    {
        $this->name = $this->user->name;
        $this->surname = $this->user->surname;
        $this->email = $this->user->email;
        $this->role = isset($this->user->roles()->first()->name) ? $this->user->roles()->first()->name : '';
        $this->roles = Role::pluck('name', 'name')->toArray();
    }
    public function render()
    {
        return view('livewire.user.user-edit')
        ->extends('layouts.app');
    }

    public function updateUser()
    {
        $this->validate();

        $this->user->update([
            'name' => $this->name,
            'surname' => $this->surname,
            'email' => $this->email,
        ]);

        $this->user->syncRoles($this->role);

        if ($this->password) {
            $this->validate(['password' => ['required', 'confirmed', Password::min(8)->mixedCase()->numbers()->symbols()->uncompromised()]]);
            $this->user->update([
                'password' => Hash::make($this->password),
            ]);
        }

        $this->alert('success', '¡Se ha actualizado al usuario correctamente!');
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);


    }
}
