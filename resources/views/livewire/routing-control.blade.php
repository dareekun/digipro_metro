<div class="container2">
    <div class="row justify-content-center">
        <div class="card">
            <div class="card-header">
                <table style="width:100%">
                    <tr>
                        <td>
                            Routing Control
                        </td>
                    </tr>
                </table>
            </div>
            <div class="card-body">
                <div class="container">
                    <div class="row">
                        <div class="cell-md-4 my-search-wrapper"></div>
                        <div class="cell-8" align="right">
                            <button class="button primary" wire:click="show_add">Add Routing</button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="cell-12">
                            <table class="table striped table-border mt-4" data-role="table" data-rownum="true"
                                data-search-wrapper=".my-search-wrapper" data-show-rows-steps="false">
                                <thead>
                                    <tr>
                                        <th style="width:50px">No</th>
                                        <th>Nik</th>
                                        <th>Name</th>
                                        <th>Role</th>
                                        <th>Level</th>
                                        <th style="width:100px">Option</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($routers as $index => $route )
                                    <tr>
                                        <td> {{$i++}} </td>
                                        <td> {{$route->username}}</td>
                                        <td> {{$route->name}}</td>
                                        <td> {{ucfirst($route->role)}}</td>
                                        <td> {{$route->level}}</td>
                                        <td>
                                            <button class="button primary small" wire:click="show_edit({{$route->id}})"><span class="mif-pencil"></span></button>
                                            <button class="button alert small" wire:click="show_delete({{$route->id}})"><span class="mif-bin"></span></button>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="5" align="center"> Empty Data </td>
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
            <div class="dialog-title">Add New Routing</div>
            <div class="dialog-content">
                <div class="row">
                    <div class="cell-3">User</div>
                    <div class="cell-8">
                        <select required data-role="select" onChange="update1()" id="option1">
                            <option value="">Select User</option>
                            @foreach ($users as $user)
                            <option value="{{$user->id}}">{{$user->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="cell-3">Department</div>
                    <div class="cell-8">
                        <select required data-role="select" onChange="update2()" id="option2">
                            <option value="0">Common</option>
                            <option value="1">Production</option>
                            <option value="2">Quality Control</option>
                            <option value="3">Warehouse</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="dialog-actions">
                <button class="button primary" type="submit">Add Routing</button>
                <button class="button warning js-dialog-close">Cancel</button>
            </div>
        </form>
    </div>
    <!-- Dialog Edit User -->
    <div wire:ignore class="dialog" data-role="dialog" id="edit_user">
        <form wire:submit.prevent="edit">
            <div class="dialog-title">Edit Routing</div>
            <div class="dialog-content">
                <div class="row">
                    <div class="cell-3">Name</div>
                    <div class="cell-8"><input data-role="input" disabled wire:model.defer="name_edit"
                            data-clear-button="false" required required type="text">
                    </div>
                </div>
                <div class="row">
                    <div class="cell-3">Department</div>
                    <div class="cell-8">
                        <select required data-role="select" onChange="update3()" id="option3">
                            <option value="0">Common</option>
                            <option value="1">Production</option>
                            <option value="2">Quality Control</option>
                            <option value="3">Warehouse</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="dialog-actions">
                <button type="submit" class="button success">Save Routing</button>
                <button class="button warning js-dialog-close">Cancel</button>
            </div>
        </form>
    </div>
    <!-- Dialog Delete user -->
    <div wire:ignore class="dialog" data-role="dialog" id="delete_user">
        <div class="dialog-title">Delete User</div>
        <div class="dialog-content">
            <div class="row">
                <div class="cell">
                    <p>Are you Sure you wanna delete this Route?</p>
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
            <div class="row">
                <div class="cell-3">Level</div>
                <div class="cell-8">: <span id="level_delete"></span></div>
            </div>
        </div>
        <div class="dialog-actions">
            <button class="button alert" wire:click="delete">Delete Routing</button>
            <button class="button warning js-dialog-close">Cancel</button>
        </div>
    </div>
</div>