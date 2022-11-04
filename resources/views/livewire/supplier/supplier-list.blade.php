<div>
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="block block-rounded">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Lista <small>Proveedores</small> {{holaMundo()}}</h3>
                        <div class="block-options">
                            @can('administrador.read')
                            <button type="button" wire:click="modalAddSupplier()" class="btn-block-option" data-toggle="block-option">
                                <i class="si si-social-dropbox"></i>
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
                                @foreach ($suppliers as $u)
                                <tr>
                                    <th>{{$u->id}}</th>
                                    <th>{{$u->supplier_name}}</th>
                                    <th>{{$u->supplier_razonsocial}}</th>
                                    <th>{{$u->supplier_rfc}}</th>
                                    <th>{{$u->supplier_curp}}</th>
                                    <th>{{$u->supplier_phone}}</th>

                                    <td class="text-center">
                                        <div class="btn-group">
                                            @can('administrador.read')
                                            <a href="{{route('supplier.edit',$u->id)}}" class="btn btn-sm text-success" data-bs-toggle="tooltip" title="Editar">
                                                <i class="fa fa-pencil-alt"></i>
                                            </a>

                                            <button type="button" class="btn btn-sm text-danger" data-bs-toggle="tooltip" title="Eliminar">
                                                <i class="fa fa-times"></i>
                                            </button>

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
                                {{ $suppliers->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('modals')
        @livewire('supplier.supplier-add')
    @endpush
</div>
