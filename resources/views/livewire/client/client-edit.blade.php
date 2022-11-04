<div>
    <div class="content">
        <div class="row mt-2">
            <div class="col-md-12">
                <div class="block block-rounded">
                    <x-form wire:submit.prevent="updateCliente">
                        <div class="block-header block-header-default">
                            <h3 class="block-title"><small>{{$client_name}}</small></h3>
                            <div class="block-options">
                                <a href="{{route('clients')}}" class="btn-block-option " data-bs-toggle="tooltip" data-bs-placement="regresar"><i class="fa fa-chevron-left"></i></a>
                                @can('administrador.read')
                                <button type="submit" class="btn-block-option" data-toggle="block-option">
                                    <i class="fa fa-floppy-disk"></i>
                                </button>
                                @endcan
                            </div>
                        </div>
                        <div class="block-content">
                            @wire
                            <div class="row mt-4">
                                <div class="col-lg-4">
                                    <x-form-input name="client_name" label="Nombre de la Empresa / Cliente" />
                                </div>
                                <div class="col-lg-4">
                                    <x-form-input name="client_razonsocial" label="Razón Social" />
                                </div>
                                <div class="col-lg-4">
                                    <x-form-input name="client_rfc" label="RFC" />
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-lg-4">
                                    <label for="">País</label>
                                    <select wire:model="client_country" class="form-select" id="client_country" aria-label="Example select with button addon">
                                        <option value="">Selecciona una opción</option>
                                        @foreach ($countries as $country)
                                            <option value="{{$country}}">{{$country}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-lg-4">
                                    <label for="">Ciudad / Estado</label>
                                    <select wire:model="client_city" class="form-select" id="client_city" aria-label="Example select with button addon">
                                        <option value="">Selecciona una opción</option>
                                        @foreach ($cities as $city)
                                            <option value="{{$city}}">{{$city}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-lg-4">
                                    <x-form-input name="client_address" label="Dirección" />
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-lg-3">
                                    <x-form-input name="client_postal" label="Código Postal" />
                                </div>
                                <div class="col-lg-3">
                                    <x-form-input name="client_phone_1" label="Teléfono 1" />
                                </div>
                                <div class="col-lg-3">
                                    <x-form-input name="client_phone_2" label="Teléfono 2" />
                                </div>
                                <div class="col-lg-3">
                                    <x-form-input name="client_logo" label="Logotipo" />
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-lg-4">
                                    <x-form-input name="client_email" label="Correo" />
                                </div>
                                <div class="col-lg-6">
                                    <x-form-textarea name="client_active" label="Describe Brevemente su Actividad" />
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
    <div class="content">
        <div class="row items-push">
            @foreach ($projects as $project)
                <div class="col-md-6 col-xl-4">
                    <!-- Project #1 -->
                    <div class="block block-rounded h-100 mb-0">
                        <div class="block-header">
                        <div class="flex-grow-1 text-muted fs-sm fw-semibold">
                            <i class="fa fa-clock me-1"></i>@php $date = new Carbon\Carbon($project->request_date) @endphp {{$date->isoFormat('LL')}}
                        </div>
                        <div class="block-options">
                            <div class="dropdown">
                            <button type="button" class="btn-block-option" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-ellipsis-v"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="javascript:void(0)">
                                <i class="fa fa-fw fa-users me-1"></i> People
                                </a>
                                <a class="dropdown-item" href="javascript:void(0)">
                                <i class="fa fa-fw fa-bell me-1"></i> Alerts
                                </a>
                                <a class="dropdown-item" href="javascript:void(0)">
                                <i class="fa fa-fw fa-check-double me-1"></i> Tasks
                                </a>
                                <div role="separator" class="dropdown-divider"></div>
                                <a class="dropdown-item" href="be_pages_projects_edit.html">
                                <i class="fa fa-fw fa-pencil-alt me-1"></i> Edit Project
                                </a>
                            </div>
                            </div>
                        </div>
                        </div>
                        <div class="block-content bg-body-light text-center">
                        <h3 class="fs-4 fw-bold mb-1">
                            <a href="be_pages_projects_tasks.html">{{$project->project_name}}</a>
                        </h3>
                        <h4 class="fs-6 text-muted mb-3">encargado</h4>
                        <div class="push">
                            <span class="badge bg-success text-uppercase fw-bold py-2 px-3">Concluido</span>
                        </div>
                        </div>
                        <div class="block-content text-center">
                        <a class="img-link m-1" href="javascript:void(0)">
                            <img class="img-avatar img-avatar48" src="assets/media/avatars/avatar2.jpg" alt="">
                        </a>
                        <a class="img-link m-1" href="javascript:void(0)">
                            <img class="img-avatar img-avatar48" src="assets/media/avatars/avatar3.jpg" alt="">
                        </a>
                        <a class="img-link m-1" href="javascript:void(0)">
                            <img class="img-avatar img-avatar48" src="assets/media/avatars/avatar9.jpg" alt="">
                        </a>
                        <a class="img-link m-1" href="javascript:void(0)">
                            <img class="img-avatar img-avatar48" src="assets/media/avatars/avatar10.jpg" alt="">
                        </a>
                        </div>
                        <div class="block-content block-content-full">
                        <div class="row g-sm">
                            <div class="col-6">
                            <a class="btn w-100 btn-alt-secondary" href="{{route('projects.edit',$project->id)}}">
                                <i class="fa fa-eye me-1 opacity-50"></i> Vista
                            </a>
                            </div>
                            <div class="col-6">
                            <a class="btn w-100 btn-alt-secondary" href="javascript:void(0)">
                                <i class="fa fa-archive me-1 opacity-50"></i> Archivos
                            </a>
                            </div>
                        </div>
                        </div>
                    </div>
                    <!-- END Project #1 -->
                </div>
            @endforeach


        </div>
    </div>
    @push('scripts')
        <script src="assets/js/dashmix.app.min.js"></script>
    @endpush

</div>
