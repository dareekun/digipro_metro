<div class="container2">
    <div class="row justify-content-center">
        <div class="card">
            <div class="card-header">
                <table style="width:100%">
                    <tr>
                        <td>
                            Lotcard Production Assembly
                        </td>
                    </tr>
                </table>
            </div>
            <div class="card-body">
                <div class="container">
                    <div class="row">
                        <div class="cell-3">Model No</div>
                        <div class="cell-6"><input type="text" data-role="input" disabled value="{{$ProductID}}"></div>
                    </div>
                    <div class="row">
                        <div class="cell-3">Lot No</div>
                        <div class="cell-6"><input data-role="datepicker"></div>
                    </div>
                    <div class="row">
                        <div class="cell-3">Shift</div>
                        <div class="cell-6">
                            <select required data-role="select" onChange="update()" id="option">
                                <option value="1">Shift 1</option>
                                <option value="2">Shift 2</option>
                                <option value="3">Shift 3</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="cell-2 offset-10">
                            <button class="button success" wire:click="add_parno">Tambah</button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="cell-8">Part Number</div>
                        <div class="cell-3">Date</div>
                        <div class="cell-1"></div>
                    </div>
                    @foreach($parts as $part)
                    <div class="row">
                        <div class="cell-8"><input type="text" data-role="input" wire:model.defer="parno"></div>
                        <div class="cell-3"><input data-role="datepicker"></div>
                        <div class="cell-1"><button class="button alert small" wire:click="delete_parts()"><span class="mif-cancel"></span></button></div>
                    </div>
                    @endfor
                </div>
            </div>
        </div>
    </div>
</div>