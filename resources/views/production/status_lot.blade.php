@extends('layouts.app')
@section('content')
<livewire:status-lot/>
@stop
@push('scripts')
<script>
function update() {
    window.livewire.emit('rubah', { data : document.getElementById("option").value});
}
window.addEventListener('toaster', event => {
    var options = {
        showTop: true,
        timeout: 2000,
        distance: 80,
        clsToast: event.detail.type
    };
    Metro.toast.create(event.detail.message, null, null, null, options);
});

window.addEventListener('open_dialog_add', event => {
    Metro.dialog.open('#add_data');
});
window.addEventListener('open_dialog_delete', event => {
    document.getElementById("product_delete").innerHTML = event.detail.product;
    document.getElementById("date_delete").innerHTML = event.detail.date;
    document.getElementById("qty_delete").innerHTML = event.detail.qty;
    Metro.dialog.open('#delete_data');
});
window.addEventListener('close_dialog_delete', event => {
    Metro.dialog.close('#delete_data');
});
</script>
@endpush