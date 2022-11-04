<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class PermissionAdd extends Component
{
    use LivewireAlert;
    public $showModal = false;
    public $name;
    public $role;

    protected $listeners = [
        'newPermission'
	];

    public $permissions = [
        'create',
        'read',
        'update',
        'delete'
    ];

    protected function rules()
    {
        return [
            'name' => 'required|min:4|max:40',
        ];
    }

    public function close()
    {
        $this->reset();
        $this->resetErrorBag();
        $this->resetValidation();
        $this->showModal = false;
    }

    public function mount()
    {

    }

    public function newPermission(Role $role)
    {
        $this->role = $role;
        $this->showModal = true;
        
    }

    public function render()
    {
        return view('livewire.user.permission-add');
    }

    public function addPermissionRole()
    {
        $this->validate();

        $admin = Role::where('name' , 'administrador')->first();

        Permission::create(['name' => $this->role->name.'.'.$this->name, 'guard_name' => 'web'])->assignRole($this->role);

        $this->role->syncPermissions(Permission::where('name', 'like', '%'.$this->role->name.'%')->get());
        $admin->syncPermissions(Permission::all());

        $this->emit('rolesListUpdate');
        $this->close();
        $this->alert('success', '¡Se ha agregado el permiso al rol correctamente!');
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
}
