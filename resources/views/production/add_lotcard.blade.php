@extends('layouts.app')
@section('content')
<livewire:add-lotcard :post="$ProductID" />
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
</script>
@endpush