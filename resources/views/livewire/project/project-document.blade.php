<div>
    <div class="modal @if ($showModal) show @endif" @if ($showModal) style="display:block; overflow-y:auto;" @endif id="modal-block-normal" tabindex="-1" role="dialog" aria-labelledby="modal-block-normal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <x-form wire:submit.prevent="{{$type_file == 'archivo'?'addDocument':($type_file == 'foto'?'addPhotos':'')}}">
                    <div class="block block-rounded block-themed block-transparent mb-0">
                        <div class="block-header {{$type_file == 'archivo'?'bg-xeco-light':($type_file == 'foto'?'bg-primary-light':'')}}">
                            <h3 class="block-title">{{$type_file == 'archivo'?'Agregar Documento '.($doc_ext == 'pdf'?'PDF':'AUTOCAD'):($type_file == 'foto'?'Agregar Fotografías':'')}}</h3>
                            <div class="block-options">
                                <button type="button" wire:click="closeModal()" class="btn-block-option" data-bs-dismiss="modal" aria-label="closeModal">
                                    <i class="fa fa-fw fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="block-content pb-3">
                            @wire
                            @if ($type_file == 'archivo')
                                <div class="form-row my-4">
                                    <div class="col-lg-12">
                                        <x-form-input name="archivo" label="" type="file" accept="application/{{$doc_ext}}" />
                                    </div>
                                </div>
                            @elseif ($type_file == 'foto')
                                <x-form-input name="archivo" label="" type="file" accept="image/jpeg,image/png,image/jpg" multiple />
                            @endif
                            @endwire
                        </div>
                        <div class="block-content block-content-full text-end bg-body">
                            <button type="button" wire:click="closeModal()" class="btn btn-sm btn-alt-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <x-form-submit class="{{$type_file == 'archivo'?'bg-xeco-light':($type_file == 'foto'?'bg-primary-light':'')}}">Guardar</x-form-submit>
                        </div>
                    </div>
                </x-form>
            </div>
        </div>
    </div>
</div>


