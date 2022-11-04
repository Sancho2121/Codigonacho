<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Livewire\Component;
use App\Trait\TableOrder;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;

class UserList extends Component
{
    use WithPagination;
    use TableOrder;

    public $name;
    public $surmane;
    public $email;
    public $search;

    protected $listeners = [
        'userListUpdate'
	];

    protected $paginationTheme = 'bootstrap';
    public $sortColumn = 'name';
    public $sortDirection = 'asc';
    public $perPage = 10;

    public $columns = [
        'id' => 'Id',
        'name' => 'Nombre',
        'surname' => 'Apellido',
        'email' => 'Correo',
        'rol' => 'Rol',
    ];

    public function render()
    {
        $users = User::select('id','name','surname','email');
        if ($this->search) {
            $users->where('id','like','%'.$this->search.'%')
            ->orWhere('name','like','%'.$this->search.'%')
            ->orWhere('surname','like','%'.$this->search.'%')
            ->orWhere('email','like','%'.$this->search.'%');
        }

        $users->orderBy($this->sortColumn, $this->sortDirection);
        return view('livewire.user.user-list',
        [
            'users' => $users->paginate($this->perPage)
        ])
        ->extends('layouts.app');
    }

    public function modalEditPermission($role)
    {
        $this->emit('editPermission', $role);
    }

    public function modalAddUser()
    {
        $this->emit('newUser');
    }
}
