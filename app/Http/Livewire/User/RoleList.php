<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Livewire\Component;
use App\Trait\TableOrder;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class RoleList extends Component
{
    use WithPagination;
    use LivewireAlert;
    use TableOrder;

    public $name;
    public $surmane;
    public $search;
    public $role_id;
    public $role;
    public $permissions_check = [];

    protected $listeners = [
        'rolesListUpdate' => 'render'
	];

    protected $paginationTheme = 'bootstrap';
    public $sortColumn = 'name';
    public $sortDirection = 'asc';
    public $perPage = 10;

    public $columns = [
        'name' => 'Nombre',
    ];

    public function render()
    {
        $roles = Role::select('id','name');
        if ($this->search) {
            $roles->where('name','like','%'.$this->search.'%');
        }
        $roles->orderBy($this->sortColumn, $this->sortDirection);

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

        return view('livewire.user.role-list',
        [
            'roles' => $roles->paginate($this->perPage),
        ])
        ->extends('layouts.app');
    }

    public function modalEditUser(User $user)
    {

    }

    public function modalAddRole($role=null)
    {
        if ($role===null) {
            $this->emit('newRole');
        } else {
            $this->emit('editRole',$role);
        }


    }

    public function modalEditRole(Role $role)
    {
        $this->role = $role;
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

    public function modalAddPermission()
    {
        $this->emit('newPermission',$this->role);
    }

    public function deleteRole(Role $role)
    {
        $admin = Role::where('name' , 'administrador')->first();
        $permissions = [
            'create',
            'read',
            'update',
            'delete'
        ];
        foreach ($permissions as $p) {
            $role->revokePermissionTo($role->name.'.'.$p);
            $admin->revokePermissionTo($role->name.'.'.$p);
        }
        $role->delete();
        Permission::where('name', 'like', '%'.$role->name.'%')->delete();
        $this->emit('rolesListUpdate');
    }
}
