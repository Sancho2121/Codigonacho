<div>
    <div class="modal @if ($showModal) show @endif" @if ($showModal) style="display:block; overflow-y:auto;" @endif id="modal-block-normal" tabindex="-1" role="dialog" aria-labelledby="modal-block-normal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                    <div class="block block-rounded block-themed block-transparent mb-0">
                        <div class="block-header bg-primary-dark">
                            <h3 class="block-title">Lista de permisos</h3>
                            <div class="block-options">
                                <button type="button" wire:click="close()" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                                    <i class="fa fa-fw fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="block-content pb-3">
                            <table class="table table-sm table-vcenter">
                                <tbody>
                                    @foreach ($permissions_check as $key => $p)
                                    <tr>
                                        <td>
                                            <div class="form-check">
                                                <input
                                                    wire:model="permissions_check.{{$key}}.check"
                                                    class="form-check-input"
                                                    type="checkbox"
                                                    readonly>
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
                        <div class="block-content block-content-full text-end bg-body">
                            <button type="button" wire:click="close()" class="btn btn-sm btn-alt-secondary" data-bs-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>
