@extends('layouts.app')
@section('content')
<livewire:product-control />
@stop
@push('scripts')
<script>
let halaman = 1;
let pencarian;
let temp_sear;

window.addEventListener('console_log', event => {
    console.log("halaman = " + halaman);
    console.log("pencarian = " + pencarian);
    temp_sear = pencarian;
});

function throw_edit(id_edit) {
    halaman = Number(document.getElementsByClassName('active')[1].textContent);
    console.log(halaman);
    window.livewire.emit('edit_open', {
        data: id_edit
    });
}

function throw_delete(id_delete) {
    halaman = Number(document.getElementsByClassName('active')[1].textContent);
    window.livewire.emit('delete_throw', {
        data: id_delete
    });
}

function last_search(text) {
    pencarian = text;
    console.log("last_search = " + pencarian);
}

window.addEventListener('keepes', event => {
    setTimeout(function() {
        Metro.getPlugin('#tables12', 'table').search(temp_sear);
        document.getElementById("table_search").value = temp_sear;
        Metro.getPlugin('#tables12', 'table').page(halaman);
    }, 50);
    console.log('keepes terpanggil');
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