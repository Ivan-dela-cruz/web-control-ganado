<div wire:ignore.self id="updateModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white" id="createModalLabel">Editar Empleado</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true close-btn">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    @include('admin.modals.employes.form')
                    <div class="text-center p-r-20">
                        <button wire:click.prevent="resetInputFields()" type="button" class="btn btn-sm btn-danger close-btn float-right ml-3" data-dismiss="modal">Cancelar</button>
                        <button wire:click.prevent="update()" class="btn btn-sm btn-info float-right ">Actualizar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
