
<div>
    <div class="modal @if ($showModal) show @endif" @if ($showModal) style="display:block; overflow-y:auto;" @endif id="modal-block-normal" tabindex="-1" role="dialog" aria-labelledby="modal-block-normal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <x-form wire:submit.prevent="addProject">
                    <div class="block block-rounded block-themed block-transparent mb-0">
                        <div class="block-header bg-primary-dark">
                            <h3 class="block-title">Nuevo Proyecto</h3>
                            <div class="block-options">
                                <button type="button" wire:click="closeModal()" class="btn-block-option" data-bs-dismiss="modal" aria-label="closeModal">
                                    <i class="fa fa-fw fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="block-content pb-3">
                            @wire
                            <div class="form-row">
                                <div class="col-lg-12 mt-3">
                                    <x-form-input name="project_name" label="Nombre del Proyecto" />
                                </div>
                                <div class="col-lg-12 my-4">
                                    <label for="">Cliente / Empresa</label>
                                    <select wire:model="client_id" class="form-select" id="client_id" aria-label="Example select with button addon">
                                        <option value="">Selecciona una opción</option>
                                        @foreach ($clients as $client)
                                            <option value="{{$client->id}}">{{$client->client_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-lg-12 my-4">
                                    <x-form-input name="request_date" label="Fecha de Solicitud" type="date" />
                                </div>
                            </div>
                            @endwire
                        </div>
                        <div class="block-content block-content-full text-end bg-body">
                            <button type="button" wire:click="closeModal()" class="btn btn-sm btn-alt-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <x-form-submit>Guardar</x-form-submit>
                        </div>
                    </div>
                </x-form>
            </div>
        </div>
    </div>
</div>
