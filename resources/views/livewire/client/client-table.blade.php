<div>
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="block block-rounded">
                    <div class="block-header block-header-default">
                        <h3 class="block-title"><small>Clientes</small></h3>
                        <div class="block-options">
                            @can('administrador.read')
                            <button type="button" wire:click="modalAddClient()" class="btn-block-option" data-toggle="block-option">
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
                                @foreach ($clients as $client)
                                <tr>
                                    <th scope="row">{{$client->id}}</th>
                                    <th scope="row">{{$client->client_name}}</th>
                                    <th scope="row">{{$client->client_razonsocial}}</th>
                                    <th scope="row">{{$client->client_city}}</th>
                                    <td class="text-center">
                                        <div class="btn-group">
                                            {{--@can('administrador.read')--}}
                                            <a href="{{route('clients.edit',$client->id)}}" class="btn btn-sm text-success" data-bs-toggle="tooltip" title="Editar">
                                                <i class="fa fa-pencil-alt"></i>
                                            </a>
                                            {{--@if ($u->roles()->first()->name!='administrador')--}}
                                            <button type="button" class="btn btn-sm text-danger" data-bs-toggle="tooltip" title="Eliminar">
                                                <i class="fa fa-times"></i>
                                            </button>
                                            {{--@endif
                                            @endcan--}}
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
                                {{ $clients->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('modals')
        @livewire('client.client-add')
        @livewire('user.permission-edit')
    @endpush
</div>
