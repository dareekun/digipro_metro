@extends('layouts.app')
@section('content')
<livewire:status-lot/>
@stop
@push('scripts')
<script>
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