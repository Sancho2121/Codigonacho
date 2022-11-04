<div>
    <div class="content">
        <div class="row">
            <div class="col-md-6">
                <div class="block block-rounded">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Lista <small>Roles</small></h3>
                        <div class="block-options">
                            <button type="button" wire:click="modalAddRole()" class="btn-block-option" data-toggle="block-option">
                                <i class="fa fa-users-gear"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content table-responsive p-1">
                        <div class="row m-2">
                            <div class="col-md-4 ms-auto">
                                <label class="text-right">
                                    <input type="search" wire:model="search" class="form-control" placeholder="Buscar" >
                                </label>
                            </div>
                        </div>
                        <table class="table table-sm table-vcenter">
                            <x-table-header :columns="$columns" sortColumn="{{$sortColumn}}" sortDirection="{{$sortDirection}}" />
                            <tbody>
                                @foreach ($roles as $u)
                                <tr>
                                    <th style="p-2">{{$u->name}}</th>
                                    <td class="text-center">
                                        <div class="btn-group">
                                            <button type="button" wire:click="modalEditRole({{ $u->id }})" class="btn btn-sm text-primary" data-bs-toggle="tooltip" title="Editar">
                                                <i class="fa fa-user-tag"></i>
                                            </button>
                                            @if ($u->name!='administrador')
                                            <button type="button" wire:click="deleteRole({{ $u->id }})"  onclick="confirm('¿Desea eliminar el rol {{ $u->name }}?') || event.stopImmediatePropagation()" class="btn btn-sm text-danger" data-bs-toggle="tooltip" title="Eliminar">
                                                <i class="fa fa-times"></i>
                                            </button>
                                            @endif
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
                                {{ $roles->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="block block-rounded">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Lista <small>Permisos</small></h3>
                        <div class="block-options">
                            @can('administrador.read')
                            @if ($role)
                            <button type="button" wire:click="modalAddPermission()" class="btn-block-option" data-toggle="block-option">
                                <i class="fa fa-user-lock"></i>
                            </button>
                            @endif
                            @endcan
                        </div>
                    </div>
                    <div class="block-content table-responsive p-1">
                        <table class="table table-sm table-vcenter">
                            <tbody>
                                @foreach ($permissions_check as $key => $p)
                                <tr>
                                    <td>
                                        <div class="form-check">
                                            <input
                                                wire:model="permissions_check.{{$key}}.check"
                                                wire:click="addPermission('{{$key}}')"
                                                class="form-check-input"
                                                type="checkbox">
                                            <label class="form-check-label">
                                            {{$key}}
                                            </label>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
    @push('modals')
        @livewire('user.role-add')
        @livewire('user.permission-add')
    @endpush
</div>
