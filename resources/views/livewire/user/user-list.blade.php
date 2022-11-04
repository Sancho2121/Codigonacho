<div>
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="block block-rounded">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Lista <small>Usuarios</small></h3>
                        <div class="block-options">
                            @can('administrador.read')
                            <button type="button" wire:click="modalAddUser()" class="btn-block-option" data-toggle="block-option">
                                <i class="fa fa-user-plus"></i>
                            </button>
                            @endcan
                        </div>
                    </div>
                    <div class="block-content table-responsive p-1">
                        <div class="row my-3 px-3">
                            <div class="col-md-2 ms-auto">
                                <label class="text-right">
                                    <input type="search" wire:model="search" class="form-control" placeholder="Buscar" >
                                </label>
                            </div>
                        </div>
                        <table class="table table-sm table-vcenter">
                            <x-table-header :columns="$columns" sortColumn="{{$sortColumn}}" sortDirection="{{$sortDirection}}" />
                            <tbody>
                                @foreach ($users as $u)
                                <tr>
                                    <th scope="row">{{$u->id}}</th>
                                    <th scope="row">{{$u->name}}</th>
                                    <th scope="row">{{$u->surname}}</th>
                                    <th scope="row">{{$u->email}}</th>
                                    <th scope="row">
                                        @if (isset($u->roles()->first()->name))
                                        <button wire:click="modalEditPermission({{ $u->roles()->first()->id ?? '' }})" class="btn btn-sm text-primary">
                                            <i class="fas fa-users-cog"></i> {{ $u->roles()->first()->name }}
                                        </button>
                                        @else
                                        Sin Role
                                        @endif
                                    </th>
                                    <td class="text-center">
                                        <div class="btn-group">
                                            @can('administrador.read')
                                            <a href="{{route('users.edit',$u->id)}}" class="btn btn-sm text-success" data-bs-toggle="tooltip" title="Editar">
                                                <i class="fa fa-pencil-alt"></i>
                                            </a>
                                            @if ($u->roles()->first()->name!='administrador')
                                            <button type="button" class="btn btn-sm text-danger" data-bs-toggle="tooltip" title="Eliminar">
                                                <i class="fa fa-times"></i>
                                            </button>
                                            @endif
                                            @endcan
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="block-content block-content-full block-content-sm bg-body-light">
                        <div class="row">
                            <div class="col-2">
                                <x-table-per-page />
                            </div>
                            <div class="pb-0 col-10">
                                {{ $users->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('modals')
        @livewire('user.user-add')
        @livewire('user.permission-edit')
    @endpush
</div>
