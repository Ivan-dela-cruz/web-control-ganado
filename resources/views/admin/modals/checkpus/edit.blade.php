<div wire:ignore.self id="updateModal"   class="modal fade my-modal"
     tabindex="-1" role="dialog"  aria-labelledby="updateModalLabel"
     aria-hidden="true" data-keyboard="false"
     data-backdrop="static">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white" id="createModalLabel">Editar chequeo veterinaro</h5>
                <button type="button" wire:click.prevent="resetInputFields()"  class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true close-btn">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    @include('admin.modals.checkpus.form')
                    <div class="text-center p-r-20">
                        <button wire:click.prevent="resetInputFields()" type="button" class="btn btn-sm btn-danger close-btn float-right ml-3" data-dismiss="modal">Cancelar</button>
                        <button wire:click.prevent="update()" class="btn btn-sm btn-info float-right ">Actualizar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
