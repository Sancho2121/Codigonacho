<div>
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="block block-rounded">
                    <x-form wire:submit.prevent="updateSupplier">
                        <div class="block-header block-header-default">
                            <h3 class="block-title">Editar <small>Proveedor</small></h3>
                            <div class="block-options">
                                <a href="{{route('suppliers')}}" class="btn-block-option"><i class="fa fa-arrow-right-to-bracket"></i></a>
                                @can('user.read')
                                <button type="submit" class="btn-block-option" data-toggle="block-option">
                                    <i class="fa fa-floppy-disk"></i>
                                </button>
                                @endcan
                            </div>
                        </div>
                        <div class="block-content">
                            @wire
                            <div class="row">
                                <div class="col-lg-4">
                                    <x-form-input name="supplier_date" label="Fecha" type="date" />
                                </div>
                                <div class="col-lg-4">
                                    <x-form-input name="supplier_name" label="Nombre" />
                                </div>
                                <div class="col-lg-4">
                                    <x-form-input name="supplier_razonsocial" label="Razón social" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4">
                                    <x-form-input name="supplier_curp" label="C.U.R.P." />
                                </div>
                                <div class="col-lg-4">
                                    <x-form-input name="supplier_address" label="Dirección" />
                                </div>
                                <div class="col-lg-4">

                                </div>
                            </div>
                            @endwire
                        </div>
                        <div class="block-content block-content-full block-content-sm bg-body-light">

                        </div>
                    </x-form>
                </div>
            </div>
        </div>
    </div>
    @push('modals')

    @endpush
</div>
