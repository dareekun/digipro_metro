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
                        <div class="cell-md-4 my-search-wrapper"></div>
                        <div class="cell-8">
                            <form method="post" action="{{route('add_lotcard')}}">
                                @csrf
                                <div class="row">
                                    <div class="cell-4 offset-6">
                                        <select required data-role="select" required id="option" name="modelno">
                                            @foreach ($products as $product)
                                            <option value="{{$product->id}}">{{$product->product}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="cell-2"  align="right">
                                        <button class="button primary" type="submit">New Lotcard</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="row">
                        <div class="cell-12">
                            <table class="table striped table-border mt-4" data-role="table"
                                data-search-wrapper=".my-search-wrapper" data-show-rows-steps="false">
                                <thead>
                                    <tr>
                                        <th style="width:50px">No</th>
                                        <th>Line</th>
                                        <th>Model No</th>
                                        <th>Date</th>
                                        <th style="width:50px">Shift</th>
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
                                            <button class="button alert small"
                                                wire:click="show_delete({{$user->id}})"><span
                                                    class="mif-bin"></span></button>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="9" align="center"> Empty Data</td>
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
    <!-- Dialog Delete Data -->
    <div wire:ignore class="dialog" data-role="dialog" id="delete_data">
        <div class="dialog-title">Delete Data Lotcard</div>
        <div class="dialog-content">
            <div class="row">
                <div class="cell">
                    <p>Are you Sure you wanna delete this data?</p>
                </div>
            </div>
            <div class="row">
                <div class="cell-3">Product</div>
                <div class="cell-8">: <span id="product_delete"></span></div>
            </div>
            <div class="row">
                <div class="cell-3">Lot</div>
                <div class="cell-8">: <span id="date_delete"></span></div>
            </div>
            <div class="row">
                <div class="cell-3">Qty</div>
                <div class="cell-8">: <span id="qty_delete"></span></div>
            </div>
        </div>
        <div class="dialog-actions">
            <button class="button alert" wire:click="delete">Delete Data</button>
            <button class="button warning js-dialog-close">Cancel</button>
        </div>
    </div>
</div>