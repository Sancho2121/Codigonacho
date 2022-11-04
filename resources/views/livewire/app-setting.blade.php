<div>
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="block block-rounded">
                    <x-form wire:submit.prevent="editApp">
                        <div class="block-header block-header-default">
                            <h3 class="block-title">Configuración de la <small>aplicación</small></h3>
                            <div class="block-options">
                                <a href="{{route('users')}}" class="btn-block-option"><i class="fa fa-arrow-right-to-bracket"></i></a>
                                @can('administrador.read')
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
                                    <x-form-input name="app_name" label="Nombre" />
                                </div>
                                <div class="col-lg-4">
                                    <x-form-input name="app_shortname" label="Nombre Corto" />
                                </div>
                                <div class="col-lg-4">
                                    <x-form-input name="app_weburl" label="URL" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4">
                                    <x-form-input name="app_logo" label="Logo" type="file"/>
                                    <div class="mt-2">
                                        <img class="img-fluid" src="{{asset('storage/images/settings/app_logo.png')}}" alt="">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <x-form-input name="app_favicon" label="Favicon" type="file" />
                                    <div class="mt-2">
                                        <img class="img-fluid" src="{{asset('storage/images/settings/app_favicon.png')}}" alt="">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <x-form-select name="app_color" label="Color" :options="['black'=>'black','light'=>'light']" />
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
