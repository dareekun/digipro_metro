@extends('layouts.app')
@section('content')
<livewire:routing-control/>
@stop
@push('scripts')
<script>
function update1() {
    window.livewire.emit('rubah', { data : document.getElementById("onuser").value, pos : 1});
}
function update2() {
    window.livewire.emit('rubah', { data : document.getElementById("ontype").value, pos : 2 });
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
    Metro.dialog.open('#adduser');
    Metro.getPlugin('#ontype', 'select').reset();
    Metro.getPlugin('#onuser', 'select').reset();
});
window.addEventListener('close_dialog_add', event => {
    Metro.dialog.close('#adduser');
});
window.addEventListener('open_dialog_edit', event => {
    Metro.dialog.open('#edituser');
});
</script>
@endpush