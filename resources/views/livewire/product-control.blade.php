<div class="container2">
    <div class="row justify-content-center">
        <div class="card">
            <div class="card-header">
                <table style="width:100%">
                    <tr>
                        <td>
                            Product Control
                        </td>
                    </tr>
                </table>
            </div>
            <div class="card-body">
                <div class="container">
                    <div class="row">
                        <div class="cell-md-4 my-search-wrapper"></div>
                        <div class="cell-8" align="right">
                            <button class="button primary" wire:click="show_add">Add Product</button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="cell-12">
                            <table class="table striped table-border mt-4" id="tables12" data-role="table"
                                data-rownum="true" data-search-wrapper=".my-search-wrapper"	data-on-search="last_search(arguments[0])"
                                data-show-rows-steps="false">
                                <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>Line</th>
                                        <th>Section</th>
                                        <th>Cycle Time</th>
                                        <th>Std Man Power</th>
                                        <th style="width:100px">Option</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($products as $product )
                                    <tr>
                                        <td> {{$product->product}}</td>
                                        <td> {{$product->line}}</td>
                                        <td> {{$product->bagian}}</td>
                                        <td> {{$product->time_proc}}</td>
                                        <td> {{$product->std_mp}}</td>
                                        <td>
                                            <button class="button primary small"
                                                onclick="throw_edit({{$product->id}})"><span
                                                    class="mif-pencil"></span></button>
                                            <button class="button alert small"
                                                onclick="throw_delete({{$product->id}})"><span
                                                    class="mif-bin"></span></button>
                                        </td>
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
    <!-- Dialog New user -->
    <div wire:ignore class="dialog" data-role="dialog" id="add_product">
        <form wire:submit.prevent="add">
            <div class="dialog-title">Add New Product</div>
            <div class="dialog-content">
                <div class="row">
                    <div class="cell-3">Product</div>
                    <div class="cell-8"><input data-role="input" wire:model.defer="product_add" data-clear-button="true"
                            required type="text">
                    </div>
                </div>
                <div class="row">
                    <div class="cell-3">Line</div>
                    <div class="cell-8"><input data-role="input" wire:model.defer="line_add" data-clear-button="true"
                            required type="text"></div>
                </div>
                <div class="row">
                    <div class="cell-3">Section</div>
                    <div class="cell-8"><input data-role="input" wire:model.defer="section_add" data-clear-button="true"
                            required type="text">
                    </div>
                </div>
                <div class="row">
                    <div class="cell-3">Cycle Time</div>
                    <div class="cell-8"><input data-role="input" wire:model.defer="cycle_add" step=".01"
                            data-clear-button="true" required type="number">
                    </div>
                </div>
                <div class="row">
                    <div class="cell-3">Man Power</div>
                    <div class="cell-8"><input data-role="input" wire:model.defer="man_add" data-clear-button="true"
                            required type="number">
                    </div>
                </div>
            </div>
            <div class="dialog-actions">
                <button class="button primary" type="submit">Add Product</button>
                <button class="button warning js-dialog-close">Cancel</button>
            </div>
        </form>
    </div>

    <!-- Dialog Edit User -->
    <div wire:ignore class="dialog" data-role="dialog" id="edit_product">
        <form wire:submit.prevent="">
            <div class="dialog-title">Edit User Data</div>
            <div class="dialog-content">
                <div class="row">
                    <div class="cell-3">Product</div>
                    <div class="cell-8"><input data-role="input" wire:model.defer="product_edit"
                            data-clear-button="true" required type="text">
                    </div>
                </div>
                <div class="row">
                    <div class="cell-3">Line</div>
                    <div class="cell-8"><input data-role="input" wire:model.defer="line_edit" data-clear-button="true"
                            required type="text"></div>
                </div>
                <div class="row">
                    <div class="cell-3">Section</div>
                    <div class="cell-8"><input data-role="input" wire:model.defer="section_edit"
                            data-clear-button="true" required type="text">
                    </div>
                </div>
                <div class="row">
                    <div class="cell-3">Cycle Time</div>
                    <div class="cell-8"><input data-role="input" wire:model.defer="cycle_edit" step=".01"
                            data-clear-button="true" required type="number">
                    </div>
                </div>
                <div class="row">
                    <div class="cell-3">Man Power</div>
                    <div class="cell-8"><input data-role="input" wire:model.defer="man_edit" data-clear-button="true"
                            required type="number">
                    </div>
                </div>
            </div>
            <div class="dialog-actions">
                <button wire:click="edit" class="button success">Save Product</button>
                <button class="button warning js-dialog-close">Cancel</button>
            </div>
        </form>
    </div>

    <!-- Dialog Delete user -->
    <div wire:ignore class="dialog" data-role="dialog" id="delete_product">
        <div class="dialog-title">Delete Product</div>
        <div class="dialog-content">
            <div class="row">
                <div class="cell">
                    <p>Are you Sure you wanna delete this product?</p>
                </div>
            </div>
            <div class="row">
                <div class="cell-3">Product</div>
                <div class="cell-8">: <span id="product_delete"></span></div>
            </div>
            <div class="row">
                <div class="cell-3">Line</div>
                <div class="cell-8">: <span id="line_delete"></span></div>
            </div>
            <div class="row">
                <div class="cell-3">Section</div>
                <div class="cell-8">: <span id="section_delete"></span></div>
            </div>
        </div>
        <div class="dialog-actions">
            <button class="button alert" wire:click="delete">Delete Product</button>
            <button class="button warning js-dialog-close">Cancel</button>
        </div>
    </div>
</div>