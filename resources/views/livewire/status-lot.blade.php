<div class="container2">
    <div class="row justify-content-center">
        <div class="card">
            <div class="card-header">
                <table style="width:100%">
                    <tr>
                        <td>
                            Lotcard Status
                        </td>
                    </tr>
                </table>
            </div>
            <div class="card-body">
                <div class="container">
                    <div class="row">
                        <div class="cell-4">
                            <input type="text" wire:model.lazy="search" data-role="input" name="search" id="search"
                                data-prepend="Search: ">
                        </div>
                        <div class="cell-8" align="right">
                            <button class="button primary" wire:click="show_add">New Lotcard</button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="cell-12">
                            <table class="table table-striped table-border cell-border">
                                <thead>
                                    <tr>
                                        <th style="width:50px">No</th>
                                        <th>Line</th>
                                        <th>Model No</th>
                                        <th>Date</th>
                                        <th>Shift</th>
                                        <th>PIC</th>
                                        <th style="width:75px">FG</th>
                                        <th style="width:75px">NG</th>
                                        <th style="width:100px">Option</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($datas as $index => $data )
                                    <tr>
                                        <td> {{$i++}} </td>
                                        <td> {{$data->line}}</td>
                                        <td> {{$data->product}}</td>
                                        <td> {{date('d M Y', strtotime($data->lotno))}}</td>
                                        <td> {{$data->pic}}</td>
                                        <td> {{$data->fg}}</td>
                                        <td> {{$data->ng}}</td>
                                        <td>
                                            <button class="button primary small">
                                                @if ($data->status == 1)
                                                <span class="mif-done"></span>
                                                @else 
                                                <span class="mif-cross-light"></span>
                                                @endif
                                            </button>
                                            <button class="button alert small" wire:click="show_delete({{$user->id}})"><span class="mif-bin"></span></button>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="8" align="center"> Empty Data </td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Dialog New user -->
    <div wire:ignore class="dialog" data-role="dialog" id="add_user">
        <form wire:submit.prevent="add">
        <div class="dialog-title">Add Data Lotcard</div>
        <div class="dialog-content">
            <div class="row">
                <div class="cell-3">Product Type</div>
                <div class="cell-8">
                    <select required data-role="select" onChange="update2()" id="option2">
                            <option value="">Select Section</option>
                            <option value="0">WD Assy</option>
                            <option value="1">Tap Cap</option>
                            <option value="2">BK Coil</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="dialog-actions">
            <button class="button primary" type="submit">Add Data</button>
            <button class="button warning js-dialog-close">Cancel</button>
        </div>
        </form>
    </div>
    <!-- Dialog Delete user -->
    <div wire:ignore class="dialog" data-role="dialog" id="delete_user">
        <div class="dialog-title">Delete Data Lotcard</div>
        <div class="dialog-content">
            <div class="row">
                <div class="cell">
                    <p>Are you Sure you wanna delete this data?</p>
                </div>
            </div>
            <div class="row">
                <div class="cell-3">Name</div>
                <div class="cell-8">: <span id="name_delete"></span></div>
            </div>
            <div class="row">
                <div class="cell-3">NIK</div>
                <div class="cell-8">: <span id="nik_delete"></span></div>
            </div>
            <div class="row">
                <div class="cell-3">Department</div>
                <div class="cell-8">: <span id="department_delete"></span></div>
            </div>
        </div>
        <div class="dialog-actions">
            <button class="button alert" wire:click="delete">Delete Data</button>
            <button class="button warning js-dialog-close">Cancel</button>
        </div>
    </div>
</div>