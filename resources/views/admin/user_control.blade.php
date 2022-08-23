@extends('layouts.app')
@section('content')
<livewire:user-control/>
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
    Metro.dialog.open('#add_user');
});
window.addEventListener('open_dialog_delete', event => {
    document.getElementById("name_delete").innerHTML = event.detail.name;
    document.getElementById("nik_delete").innerHTML = event.detail.nik;
    document.getElementById("department_delete").innerHTML = event.detail.department;
    Metro.dialog.open('#delete_user');
});
window.addEventListener('close_dialog_delete', event => {
    Metro.dialog.close('#delete_user');
});
window.addEventListener('open_dialog_edit', event => {
    Metro.getPlugin('#option3', 'select').val(event.detail.role);
    Metro.getPlugin('#option4', 'select').val(event.detail.department);
    Metro.dialog.open('#edit_user');
});
window.addEventListener('close_dialog_edit', event => {
    Metro.dialog.close('#edit_user');
});
</script>
@endpush