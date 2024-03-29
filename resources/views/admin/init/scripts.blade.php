
<!-- Required Js -->
<script src="{{asset('assets2/js/vendor-all.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets2/js/plugins/bootstrap.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets2/js/ripple.js')}}" type="text/javascript"></script>
<script src="{{asset('assets2/js/pcoded.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets2/js/menu-setting.js')}}" type="text/javascript"></script>

<!-- Apex Chart -->
<script src="{{asset('assets2/js/plugins/apexcharts.min.js')}}" type="text/javascript"></script>
<!-- custom-chart js -->
<script src="{{asset('assets2/js/pages/dashboard-main.js')}}" type="text/javascript"></script>
<script src="{{asset('assets2/js/plugins/sweetalert.min.js')}}"></script>
<script src="{{asset('js/axios.min.js')}}" type="text/javascript" ></script>
<!-- datatable Js -->
<script src="{{asset('assets2/js/plugins/jquery.dataTables.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets2/js/plugins/dataTables.bootstrap4.min.js')}}" type="text/javascript"></script>

<script src="{{asset('js/admin/index.js')}}" type="text/javascript" type="text/javascript"></script>
<script src="{{asset('assets2/js/pages/data-styling-custom.js')}}" type="text/javascript"></script>


<!-- select2 Js -->
<script src="{{asset('assets2/js/plugins/select2.full.min.js')}}"></script>
<!-- form-select-custom Js -->
<script src="{{asset('assets2/js/pages/form-select-custom.js')}}"></script>
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.0/dist/alpine.min.js" defer></script>

<script src="{{asset('plugins/select2/dist/js/select2.full.min.js')}}"></script>
<script src="{{asset('plugins/select2/dist/js/select2.min.js')}}"></script>

<!-- custom-chart js -->
<script src="{{asset('assets2/js/pages/dashboard-sale.js')}}"></script>

 @livewireScripts
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
 <x-livewire-alert::scripts />

<script type="text/javascript">
window.livewire.on('courseStore', () => {
    $('#createModal').modal('hide');
    $('#updateModal').modal('hide');
});
window.livewire.on('periodStore', () => {
    $('#createModal').modal('hide');
    $('#updateModal').modal('hide');
});
window.livewire.on('subjectStore', () => {
    $('#createModal').modal('hide');
    $('#updateModal').modal('hide');
});

window.livewire.on('studentStore', () => {
    $('#createModal').modal('hide');
    $('#updateModal').modal('hide');
});
window.livewire.on('teacherStore', () => {
    $('#createModal').modal('hide');
    $('#updateModal').modal('hide');
});
window.livewire.on('levelStore', () => {
    $('#createModal').modal('hide');
    $('#updateModal').modal('hide');
});
window.livewire.on('taskStore', () => {
    $('#createModal').modal('hide');
    $('#updateModal').modal('hide');
});
window.livewire.on('fileStore', () => {
    $('#createModal').modal('hide');
    $('#updateModal').modal('hide');
});
window.livewire.on('treatmentStore', () => {
    $('#createModal').modal('hide');
    $('#updateModal').modal('hide');
});
window.livewire.on('diseaseStore', () => {
    $('#createModal').modal('hide');
    $('#updateModal').modal('hide');
});
window.livewire.on('mastitisStore', () => {
    $('#createModal').modal('hide');
    $('#updateModal').modal('hide');
});
window.livewire.on('veterinaryStore', () => {
    $('#createModal').modal('hide');
    $('#updateModal').modal('hide');
});
window.livewire.on('animalStore', () => {
    $('#createModal').modal('hide');
    $('#updateModal').modal('hide');
});
window.livewire.on('mastitisStore', () => {
    $('#createModal').modal('hide');
    $('#updateModal').modal('hide');
});
window.livewire.on('Success', () => {
    swal("¡Satisfactorio!", "Proceso realizado con exíto", "success");
});
window.livewire.on('Warning', () => {
    swal("¡Alvertencia!", "Tu cambio afectará a otros registros", "warning");
});
window.livewire.on('Danger', () => {
    swal("¡Error!", "Se produjo un error en la petición", "error");
});
window.livewire.on('RoleEdit', () => {
    $('.btn_store_rol').attr('hidden',true);
    $('.btn_update_rol').removeAttr('hidden','hidden');
});
window.livewire.on('RoleUpdate', () => {
    $('.btn_update_rol').attr('hidden',true);
    $('.btn_store_rol').removeAttr('hidden','hidden');
});

//code
window.livewire.on('newPurchase', () => {
    $('#addItemPurchase').removeAttr('disabled');
    $('#btnNewPurchase').attr('disabled','disabled');
    $('#btnNewPurchase').addClass('d-none');
    $('#btnUpPurchase').removeClass('d-none');
});

window.livewire.on('endPurchase', () => {
    $('#btnNewPurchase').removeAttr('disabled');
    $('#addItemPurchase').attr('disabled','disabled');
    $('#btnUpPurchase').addClass('d-none');
    $('#btnNewPurchase').removeClass('d-none');
});

window.livewire.on('newSale', () => {
    $('#addItemSale').removeAttr('disabled');
    $('#btnNewSale').attr('disabled','disabled');
    $('#btnNewSale').addClass('d-none');
    $('#btnUpSale').removeClass('d-none');
});

window.livewire.on('endSale', () => {
    $('#btnNewSale').removeAttr('disabled');
    $('#addItemSale').attr('disabled','disabled');
    $('#btnUpSale').addClass('d-none');
    $('#btnNewSale').removeClass('d-none');
});

window.livewire.on('showUpdate', () => {
    $('#updateModal').modal('show');
});
window.livewire.on('showCreate', () => {
    $('#createModal').modal('show');
});
window.livewire.on('forceCloseModal', () => {
    if ($('.modal-backdrop').is(':visible')) {
       $('body').removeClass('modal-open');
        $('.modal-backdrop').remove();
    };
});
</script>

@yield('scripts')
