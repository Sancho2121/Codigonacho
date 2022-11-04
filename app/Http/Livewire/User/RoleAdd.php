<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Livewire\Component;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class RoleAdd extends Component
{

    use LivewireAlert;
    public $showModal = false;
    public $old_name;
    public $name;
    public $role = null;
    public $count_user;

    protected $listeners = [
        'newRole',
        'editRole'
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
            'name' => 'required|min:2|max:20',
        ];
    }

    public function close()
    {
        $this->reset();
        $this->resetErrorBag();
        $this->resetValidation();
        $this->showModal = false;
    }

    public function newRole()
    {
        $this->showModal = true;
    }

    public function editRole(Role $role)
    {
        $this->role = $role;
        $this->old_name = $role->name;
        $this->name = $role->name;
        

        $this->showModal = true;
    }

    public function render()
    {

        return view('livewire.user.role-add');
    }

    public function addRole()
    {
        $this->validate();
        $admin = Role::where('name' , 'administrador')->first();
        if ($this->role===null) {
            $role = Role::create(['name' => $this->name, 'role_name' => $this->name,'guard_name' => 'web']);
            foreach ($this->permissions as $p) {
                Permission::create(['name' => $this->name.'.'.$p, 'guard_name' => 'web'])->assignRole($role);
            }
            $role->syncPermissions(Permission::where('name', 'like', '%'.$this->name.'%')->get());
            $admin->syncPermissions(Permission::all());
        } else {
            $role = $this->role;
            foreach ($this->permissions as $p) {
            $permission = Permission::where('name' , '%'.$this->old_name.'%')->first();
            $permission->update(['name' => $this->name.'.'.$p]);
        }
            $role->syncPermissions(Permission::where('name', 'like', '%'.$this->name.'%')->get());
            $admin->syncPermissions(Permission::all());
        }



        $this->emit('rolesListUpdate');
        $this->close();
        $this->alert('success', '¡Se ha agregado el rol correctamente!');
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }


}
