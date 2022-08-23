<div class="container2">
    <div class="row justify-content-center">
        <div class="card">
            <div class="card-header">
                <table style="width:100%">
                    <tr>
                        <td>
                            Log Record
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
                    </div>
                    <div class="row">
                        <div class="cell-12">
                            <table class="table table-striped table-border cell-border">
                                <thead>
                                    <tr>
                                        <th style="width:50px">No</th>
                                        <th>Job</th>
                                        <th>Status</th>
                                        <th>Time</th>
                                        <th>Remark</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($records as $index => $record )
                                    <tr>
                                        <td> {{$i++}} </td>
                                        <td> {{$record->job}}</td>
                                        <td> {{$record->status}}</td>
                                        <td> {{$record->time}}</td>
                                        <td> {{$record->remark}}</td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="6" align="center"> Empty Data </td>
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
</div>