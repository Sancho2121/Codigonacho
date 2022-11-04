<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Spatie\Permission\Models\Role;

class PermissionEdit extends Component
{
    use LivewireAlert;
    public $showModal = false;
    public $role;
    public $permissions_check;

    protected $listeners = [
        'editPermission'
	];

    public function close()
    {
        $this->reset();
        $this->resetErrorBag();
        $this->resetValidation();
        $this->showModal = false;
    }

    public function editPermission(Role $role)
    {
        $this->role = $role;
        $this->showModal = true;
    }

    public function render()
    {
        $permissions = Permission::all();
        if ($this->role) {
            $havePermission = $this->role->permissions()->get();
            foreach ($permissions as $permission) {
                if($havePermission->contains($permission)){
                    $this->permissions_check[$permission->name]['check'] = true;
                }else{
                    $this->permissions_check[$permission->name]['check'] = false;
                }
                $this->permissions_check[$permission->name]['id'] = $permission->id;
            }
        }else{
            $this->permissions_check = [];
        }
        return view('livewire.user.permission-edit');
    }

    public function addPermission($permission)
    {
        if (!$this->role->hasPermissionTo($permission)) {
            $this->role->givePermissionTo($permission);
            $this->alert('success', '¡Se ha agregado el permiso correctamente!');
        }else{
            $this->role->revokePermissionTo($permission);
            $this->alert('success', '¡Se ha eliminado el permiso correctamente!');
        }

    }
}
