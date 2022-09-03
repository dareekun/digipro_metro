<div class="container2">
    <div class="row justify-content-center">
        <div class="card">
            <div class="card-header">
                <table style="width:100%">
                    <tr>
                        <td>
                            Data Production
                        </td>
                    </tr>
                </table>
            </div>
            <div class="card-body">
                <div class="container">
                    <div class="row">
                        <div class="cell-md-4 my-search-wrapper"></div>
                    </div>
                    <div class="row">
                        <div class="cell-12">
                            <table class="table striped table-border mt-4" data-role="table" data-rownum="false"
                                data-search-wrapper=".my-search-wrapper" data-show-rows-steps="false">
                                <thead>
                                    <tr>
                                        <th style="width:50px">No</th>
                                        <th>Model No</th>
                                        <th>Date</th>
                                        <th style="width:50px">Shift</th>
                                        <th>Qty</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($datas as $index => $data )
                                    <tr>
                                        <td> {{$i++}} </td>
                                        <td> {{$data->product}}</td>
                                        <td> {{$data->date}}</td>
                                        <td> {{$data->shift}}</td>
                                        <td> {{$data->qty}}</td>
                                        <td> {{$data->pic}}</td>
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