
<div>
    <style>
        .ck-editor__editable {min-height: 350px;}
    </style>
    <div class="bg-body-light d-print-none">
        <div class="content content-full">
            <div class="row mt-2">
                <div class="col-lg-3">
                    <label for=""><b>Empresa / Cliente</b></label>
                    <p>&nbsp;&nbsp;{{$client_view->client_name}}</p>
                </div>
                <div class="col-lg-3">
                    <label for=""><b>Razón Social</b></label>
                    <p>&nbsp;&nbsp;{{$client_view->client_razonsocial}}</p>
                </div>
                <div class="col-lg-4">
                    <label for=""><b>Dirección</b></label>
                    <p>&nbsp;&nbsp;{{$client_view->client_address}}</p>
                </div>
                <div class="col-lg-2">
                    <a href="{{route('clients.edit',$client_id)}}" class="btn btn-alt-primary my-2" style="float: right;" data-bs-toggle="tooltip">
                        <i class="fa fa-fw fa-eye me-1 opacity-50"></i> ver
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <x-form wire:submit.prevent="updateProject">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Ejecución de Proyecto<small> {{$project_name}}</small></h3>
                <div class="block-options">
                    <a href="{{route('projects',$project_type)}}" class="btn-block-option " data-bs-toggle="tooltip" data-bs-placement="regresar"><i class="fa fa-chevron-left"></i></a>&nbsp;&nbsp;
                    @can('administrador.read')
                    <button type="submit" class="btn-block-option" data-toggle="block-option">
                        <i class="fa fa-floppy-disk"></i>
                    </button>
                    @endcan
                </div>
            </div>
            <div class="block-content">
                @wire
                <div class="row my-5">
                    <div class="col-lg-4">
                        <x-form-input name="project_name" label="Nombre del Proyecto" />
                    </div>
                    <div class="col-lg-4">
                        <x-form-input name="contact_name" label="Nombre del contacto" />
                    </div>
                    <div class="col-lg-4">
                        <x-form-input name="contact_phone" label="Número de teléfono" />
                    </div>
                </div>
            </div>
        </div>
        <!-- END Blocks API -->
        <h2 class="content-heading"><i class="fa fa-fw fa-person-digging text-muted me-1"></i> Levantamiento
            <a href="{{ route('document.levantamiento',$project) }}" class="btn btn-sm text-danger" style="float: right;">
                <i class="fas fa-file-pdf fa-2x"></i>&nbsp;
            </a>
        </h2>
        <div class="row">
            <div class="col-md-3">
                <div class="block block-rounded">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Plano del Levantamiento PDF</h3>
                        <div class="block-options">
                            <button type="button" wire:click="modalAddDocument('levantamiento','pdf')" class="btn-block-option" data-toggle="block-option">
                                <i class="fa fa-plus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content" style="text-align: center">
                        @if (DB::table('document_projects')->where('project_id', $project->id)->where('file_name', 'levantamiento')->where('file_ext','pdf')->exists())
                            @php $levantamiento_id = App\Models\DocumentProject::where('project_id', $project->id)->where('file_name', 'levantamiento')
                                    ->where('file_ext','pdf')->select('id','file_path_name_ext')->first(); @endphp
                            <a href="{{ route('document.show', $levantamiento_id->id) }}" class="btn btn-sm text-primary" target="_black">
                                <i class="fas fa-eye fa-2x"></i>
                            </a>
                            <a href="{{ route('document.download', $levantamiento_id->id) }}" class="btn btn-sm text-success" target="_black">
                                <i class="fas fa-cloud-download-alt fa-2x"></i>
                            </a>
                            <button wire:click="deleteDocument({{ $levantamiento_id }})" class="btn btn-sm text-danger">
                                <i class="far fa-trash-alt fa-2x"></i>
                            </button>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="block block-rounded">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Plano del Levantamiento AUTOCAD</h3>
                        <div class="block-options">
                            <button type="button" wire:click="modalAddDocument('levantamiento','dwg')" class="btn-block-option" data-toggle="block-option">
                                <i class="fa fa-plus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content" style="text-align: center">
                        @if (DB::table('document_projects')->where('project_id', $project->id)->where('file_name', 'levantamiento')->where('file_ext','dwg')->exists())
                            @php $levantamiento_id = App\Models\DocumentProject::where('project_id', $project->id)->where('file_name', 'levantamiento')
                                    ->where('file_ext','dwg')->select('id','file_path_name_ext')->first(); @endphp
                            <a href="{{ route('document.download', $levantamiento_id->id) }}" class="btn btn-sm text-success" target="_black">
                                <i class="fas fa-cloud-download-alt fa-2x"></i>
                            </a>
                            <button wire:click="deleteDocument({{ $levantamiento_id }})" class="btn btn-sm text-danger">
                                <i class="far fa-trash-alt fa-2x"></i>
                            </button>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="block block-rounded">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Fotografías del Estado Actual</h3>
                        <div class="block-options">
                            <button type="button" wire:click="modalAddPhoto('levantamiento_foto')" class="btn-block-option mb-1" data-toggle="block-option">
                                <i class="fa fa-plus"></i>
                            </button>&nbsp;
                            <button type="button" class="btn-block-option" data-toggle="block-option" data-action="fullscreen_toggle"></button>&nbsp;
                            <button type="button" class="btn-block-option" data-toggle="block-option" data-action="content_toggle"><i class="si si-arrow-up"></i></button>
                        </div>
                    </div>
                    <div class="block-content">
                        @if (DB::table('document_projects')->where('project_id', $project->id)->where('file_name', 'levantamiento_foto')->exists())
                        @php $levantamiento_id = App\Models\DocumentProject::where('project_id', $project->id)->where('file_name', 'levantamiento_foto')->select('id','file_path_name_ext')->get(); @endphp
                            <div class="row items-push">
                                @foreach ($levantamiento_id as $levantamiento)
                                    <div class="col-md-4 animated fadeIn">
                                        <div class="options-container fx-item-zoom-in">
                                            <img class="img-fluid options-item" src="{{asset('storage/'.$levantamiento->file_path_name_ext)}}" alt="">
                                            <div class="options-overlay bg-black-75">
                                                <div class="options-overlay-content">
                                                    <a class="btn btn-sm btn-primary" href="{{ route('document.download', $levantamiento->id) }}">
                                                        <i class="fas fa-cloud-download-alt"></i>
                                                    </a>
                                                    <a class="btn btn-sm btn-danger" wire:click="deleteDocument({{ $levantamiento }})" >
                                                        <i class="far fa-trash-alt"> </i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <h2 class="content-heading"><i class="fa fa-fw fa-file-image text-muted me-1"></i> Proyecto</h2>
        <div class="row">
            <div class="col-md-3">
                <div class="block block-rounded">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Plano de Instalación de Barrisol PDF</h3>
                        <div class="block-options">
                            <button type="button" wire:click="modalAddDocument('proyecto_plano_barrisol','pdf')" class="btn-block-option" data-toggle="block-option">
                                <i class="fa fa-plus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content" style="text-align: center">
                        @if (DB::table('document_projects')->where('project_id', $project->id)->where('file_name', 'proyecto_plano_barrisol')->where('file_ext','pdf')->exists())
                            @php $proyecto = App\Models\DocumentProject::where('project_id', $project->id)->where('file_name', 'proyecto_plano_barrisol')
                                    ->where('file_ext','pdf')->select('id','file_path_name_ext')->first(); @endphp
                            <a href="{{ route('document.show', $proyecto->id) }}" class="btn btn-sm text-primary" target="_black">
                                <i class="fas fa-eye fa-2x"></i>
                            </a>
                            <a href="{{ route('document.download', $proyecto->id) }}" class="btn btn-sm text-success" target="_black">
                                <i class="fas fa-cloud-download-alt fa-2x"></i>
                            </a>
                            <button wire:click="deleteDocument({{ $proyecto }})" class="btn btn-sm text-danger">
                                <i class="far fa-trash-alt fa-2x"></i>
                            </button>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="block block-rounded">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Plano de Instalación de Barrisol AUTOCAD</h3>
                        <div class="block-options">
                            <button type="button" wire:click="modalAddDocument('proyecto_plano_barrisol','dwg')" class="btn-block-option" data-toggle="block-option">
                                <i class="fa fa-plus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content" style="text-align: center">
                        @if (DB::table('document_projects')->where('project_id', $project->id)->where('file_name', 'proyecto_plano_barrisol')->where('file_ext','dwg')->exists())
                            @php $proyecto = App\Models\DocumentProject::where('project_id', $project->id)->where('file_name', 'proyecto_plano_barrisol')
                                    ->where('file_ext','dwg')->select('id','file_path_name_ext')->first(); @endphp
                            <a href="{{ route('document.download', $proyecto->id) }}" class="btn btn-sm text-success" target="_black">
                                <i class="fas fa-cloud-download-alt fa-2x"></i>
                            </a>
                            <button wire:click="deleteDocument({{ $proyecto }})" class="btn btn-sm text-danger">
                                <i class="far fa-trash-alt fa-2x"></i>
                            </button>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="block block-rounded">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Plano de Instalación de Iluminación PDF</h3>
                        <div class="block-options">
                            <button type="button" wire:click="modalAddDocument('proyecto_plano_iluminacion','pdf')" class="btn-block-option" data-toggle="block-option">
                                <i class="fa fa-plus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content" style="text-align: center">
                        @if (DB::table('document_projects')->where('project_id', $project->id)->where('file_name', 'proyecto_plano_iluminacion')->where('file_ext','pdf')->exists())
                            @php $proyecto = App\Models\DocumentProject::where('project_id', $project->id)->where('file_name', 'proyecto_plano_iluminacion')
                                    ->where('file_ext','pdf')->select('id','file_path_name_ext')->first(); @endphp
                            <a href="{{ route('document.show', $proyecto->id) }}" class="btn btn-sm text-primary" target="_black">
                                <i class="fas fa-eye fa-2x"></i>
                            </a>
                            <a href="{{ route('document.download', $proyecto->id) }}" class="btn btn-sm text-success" target="_black">
                                <i class="fas fa-cloud-download-alt fa-2x"></i>
                            </a>
                            <button wire:click="deleteDocument({{ $proyecto }})" class="btn btn-sm text-danger">
                                <i class="far fa-trash-alt fa-2x"></i>
                            </button>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="block block-rounded">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Plano de Instalación de Iluminación AUTOCAD</h3>
                        <div class="block-options">
                            <button type="button" wire:click="modalAddDocument('proyecto_plano_iluminacion','dwg')" class="btn-block-option" data-toggle="block-option">
                                <i class="fa fa-plus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content" style="text-align: center">
                        @if (DB::table('document_projects')->where('project_id', $project->id)->where('file_name', 'proyecto_plano_iluminacion')->where('file_ext','dwg')->exists())
                            @php $proyecto = App\Models\DocumentProject::where('project_id', $project->id)->where('file_name', 'proyecto_plano_iluminacion')
                                    ->where('file_ext','dwg')->select('id','file_path_name_ext')->first(); @endphp
                            <a href="{{ route('document.download', $proyecto->id) }}" class="btn btn-sm text-success" target="_black">
                                <i class="fas fa-cloud-download-alt fa-2x"></i>
                            </a>
                            <button wire:click="deleteDocument({{ $proyecto }})" class="btn btn-sm text-danger">
                                <i class="far fa-trash-alt fa-2x"></i>
                            </button>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <h2 class="content-heading"><i class="fa fa-fw fa-money-check-dollar text-muted me-1"></i> Presupuesto</h2>
        <div class="row">
            <div class="col-md-6">
                <div class="block block-rounded">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Presupuesto (concepto y alcances)</h3>
                        <div class="block-options">
                            <button type="button" wire:click="modalAddDocument('presupuesto','pdf')" class="btn-block-option" data-toggle="block-option">
                                <i class="fa fa-plus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content">
                        @if (DB::table('document_projects')->where('project_id', $project->id)->where('file_name', 'presupuesto')->where('file_ext','pdf')->exists())
                            @php $presupuesto = App\Models\DocumentProject::where('project_id', $project->id)->where('file_name', 'presupuesto')
                                    ->where('file_ext','pdf')->select('id','file_path_name_ext')->first(); @endphp
                            <a href="{{ route('document.show', $presupuesto->id) }}" class="btn btn-sm text-primary" target="_black">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="{{ route('document.download', $presupuesto->id) }}" class="btn btn-sm text-success" target="_black">
                                <i class="fas fa-cloud-download-alt"></i>
                            </a>
                            <button wire:click="deleteDocument({{ $presupuesto }})" class="btn btn-sm text-danger">
                                <i class="far fa-trash-alt"></i>
                            </button>
                            <td>&nbsp;<b>Presupuesto (concepto y alcances)</b></td>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-md-6">

            </div>
        </div>
        <h2 class="content-heading"><i class="fa fa-fw fa-calendar-days text-muted me-1"></i> Programación</h2>
        <div class="row">
            <div class="col-md-6">
                <div class="block block-rounded">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Fecha de Ejecución Programada</h3>
                        <div class="block-options">
                        </div>
                    </div>
                    <div class="block-content">
                        <div class="row my-3">
                            <div class="col-lg-4">
                                <x-form-input name="execution_date" label="Del" type="date"/>
                            </div>
                            <div class="col-lg-4">
                                <x-form-input name="end_execution_date" label="Al" type="date"/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="block block-rounded">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Logística para Acceso a Ejecución</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-toggle="block-option" data-action="fullscreen_toggle"></button>&nbsp;
                            <button type="button" class="btn-block-option" data-toggle="block-option" data-action="pinned_toggle">
                                <i class="si si-pin"></i>
                            </button>&nbsp;
                            <button type="button" class="btn-block-option" data-toggle="block-option" data-action="content_toggle"><i class="si si-arrow-up"></i></button>
                        </div>
                    </div>
                    <div class="block-content">
                        <div class="row push">
                            <div class="col-lg-12" wire:ignore wire:key="MyId" style="height: 400px">
                                <textarea id="archivo_contenido" name="dm-post-edit-body" style="height: 400px">
                                    {{$logistics}}
                                </textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <h2 class="content-heading"><i class="fa fa-fw fa-camera-retro text-muted me-1"></i> Reporte Fotográfico</h2>
        <div class="row">
            <div class="col-md-12">
                <div class="block block-rounded">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Reporte Fotográfico</h3>
                        <div class="block-options">
                            <button type="button" wire:click="modalAddPhoto('reporte_fotografico')" class="btn-block-option" data-toggle="block-option">
                                <i class="fa fa-plus"></i>
                            </button>&nbsp;
                            <button type="button" class="btn-block-option" data-toggle="block-option" data-action="fullscreen_toggle"></button>&nbsp;
                            <button type="button" class="btn-block-option" data-toggle="block-option" data-action="content_toggle"><i class="si si-arrow-up"></i></button>
                        </div>
                    </div>
                    <div class="block-content">
                        @if (DB::table('document_projects')->where('project_id', $project->id)->where('file_name', 'reporte_fotografico')->exists())
                        @php $reporte_fotografico_id = App\Models\DocumentProject::where('project_id', $project->id)->where('file_name', 'reporte_fotografico')->select('id','file_path_name_ext')->get(); @endphp
                            <div class="row items-push">
                                @foreach ($reporte_fotografico_id as $reporte_fotografico)
                                    <div class="col-md-4 animated fadeIn">
                                        <div class="options-container fx-item-zoom-in">
                                            <img class="img-fluid options-item" src="{{asset('storage/'.$reporte_fotografico->file_path_name_ext)}}" alt="">
                                            <div class="options-overlay bg-black-75">
                                                <div class="options-overlay-content">
                                                    <a class="btn btn-sm btn-primary" href="{{ route('document.download', $reporte_fotografico->id) }}">
                                                        <i class="fas fa-cloud-download-alt"></i>
                                                    </a>
                                                    <a class="btn btn-sm btn-danger" wire:click="deleteDocument({{ $reporte_fotografico }})" >
                                                        <i class="far fa-trash-alt"> </i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <h2 class="content-heading"><i class="fa fa-fw fa-circle-dollar-to-slot text-muted me-1"></i> Finiquito</h2>
        <div class="row">
            <div class="col-md-6">
                <div class="block block-rounded">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Presupuesto (concepto y alcances)</h3>
                        <div class="block-options">
                            <button type="button" wire:click="modalAddDocument('documento_finiquito','pdf')" class="btn-block-option" data-toggle="block-option">
                                <i class="fa fa-plus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content">
                        @if (DB::table('document_projects')->where('project_id', $project->id)->where('file_name', 'documento_finiquito')->where('file_ext','pdf')->exists())
                            @php $finiquito = App\Models\DocumentProject::where('project_id', $project->id)->where('file_name', 'documento_finiquito')
                                    ->where('file_ext','pdf')->select('id','file_path_name_ext')->first(); @endphp
                            <a href="{{ route('document.show', $finiquito->id) }}" class="btn btn-sm text-primary" target="_black">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="{{ route('document.download', $finiquito->id) }}" class="btn btn-sm text-success" target="_black">
                                <i class="fas fa-cloud-download-alt"></i>
                            </a>
                            <button wire:click="deleteDocument({{ $finiquito }})" class="btn btn-sm text-danger">
                                <i class="far fa-trash-alt"></i>
                            </button>
                            <td>&nbsp;<b>Finiquito</b></td>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-md-6">

            </div>
        </div>
        @endwire
        </x-form>
    </div>
    @push('modals')
        @livewire('project.project-document')
    @endpush
    @push('scripts')
    <script src="{{ asset('js/plugins/ckeditor5-classic/build/ckeditor.js') }}"></script>
    <script>
    if (document.querySelector("#archivo_contenido")) {
        ClassicEditor.create(document.querySelector("#archivo_contenido"), {    // <--- MODIFIED
            //plugins: [ Alignment ],
            toolbar: [ 'heading',
			'|',
			'bold',
			'italic',
			'link',
			'bulletedList',
			'numberedList',
			'|',
			'outdent',
			'indent',
			'|',
			'uploadImage',
			'blockQuote',
			'insertTable',
			'mediaEmbed',
			'undo',
			'redo' ]                       // <--- MODIFIED
        } )

        .then(editor => {
            editor.model.document.on('change:data', () => {
                console.log(editor.getData())
                @this.set('logistics', editor.getData())
            })
        })
        .catch( error => {
        console.error( error.stack );
        });
    }
    </script>
    @endpush
    <script>
        // Note that the name "myDropzone" is the camelized
        // id of the form.
        Dropzone.options.myDropzone = {
          // Configuration options go here
        };
    </script>
</div>
