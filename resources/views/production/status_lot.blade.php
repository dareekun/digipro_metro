@extends('layouts.app')
@section('content')
<livewire:status-lot/>
@stop
@push('scripts')
<script>
    function updateSelect(id){
            if (id == 'empty') {
                Metro.getPlugin("#select1", 'select').data([]);
            } else {
                $.get("products/" + id).then(function (response) {
                    console.log(response);
                    Metro.getPlugin("#select1", 'select').data(JSON.parse(response));
                });
            }
        }
</script>
@endpush