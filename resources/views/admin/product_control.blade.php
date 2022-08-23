@extends('layouts.app')
@section('content')
<livewire:product-control/>
@stop
@push('scripts')
<script>
function update1() {
    window.livewire.emit('rubah', { data : document.getElementById("option1").value, pos : 1});
}
function update2() {
    window.livewire.emit('rubah', { data : document.getElementById("option2").value, pos : 2 });
}
function update3() {
    window.livewire.emit('rubah', { data : document.getElementById("option3").value, pos : 3 });
}
function update4() {
    window.livewire.emit('rubah', { data : document.getElementById("option4").value, pos : 4 });
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
    Metro.dialog.open('#add_product');
});
window.addEventListener('close_dialog_add', event => {
    Metro.dialog.close('#add_product');
});
window.addEventListener('open_dialog_delete', event => {
    document.getElementById("product_delete").innerHTML = event.detail.product;
    document.getElementById("line_delete").innerHTML = event.detail.line;
    document.getElementById("section_delete").innerHTML = event.detail.section;
    Metro.dialog.open('#delete_product');
});
window.addEventListener('close_dialog_delete', event => {
    Metro.dialog.close('#delete_product');
});
window.addEventListener('open_dialog_edit', event => {
    Metro.dialog.open('#edit_product');
});
window.addEventListener('close_dialog_edit', event => {
    Metro.dialog.close('#edit_product');
});
</script>
@endpush