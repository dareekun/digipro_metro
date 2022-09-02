<div class="container2">
    <div class="row justify-content-center">
        <div class="card">
            <div class="card-header">
                <table style="width:100%">
                    <tr>
                        <td>
                            User Control
                        </td>
                    </tr>
                </table>
            </div>
            <div class="card-body">
                <div class="container">
                    <div class="row">
                        <div class="cell-md-4 my-search-wrapper"></div>
                        <div class="cell-8" align="right">
                            <button class="button primary" wire:click="show_add">New User</button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="cell-12">
                            <table class="table striped table-border mt-4" data-role="table" data-rownum="true"
                                data-search-wrapper=".my-search-wrapper" data-show-rows-steps="false">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>NIK</th>
                                        <th>Role</th>
                                        <th>Department</th>
                                        <th>Email</th>
                                        <th style="width:100px">Option</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($users as $index => $user )
                                    <tr>
                                        <td> {{$user->name}}</td>
                                        <td> {{$user->username}}</td>
                                        <td> {{ucfirst($user->role)}}</td>
                                        <td> {{$user->department}}</td>
                                        <td> {{$user->email}}</td>
                                        <td>
                                            <button class="button primary small" onclick="show_edit({{$user->id}})"><span class="mif-pencil"></span></button>
                                            <button class="button alert small" onclick="show_delete({{$user->id}})"><span class="mif-bin"></span></button>
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
        <div class="dialog-title">Add New User</div>
        <div class="dialog-content">
            <div class="row">
                <div class="cell-3">Name</div>
                <div class="cell-8"><input data-role="input" wire:model.defer="name_add" data-clear-button="true"
                        required type="text">
                </div>
            </div>
            <div class="row">
                <div class="cell-3">NIK</div>
                <div class="cell-8"><input data-role="input" wire:model.defer="nik_add" data-clear-button="true"
                        required type="number"></div>
            </div>
            <div class="row">
                <div class="cell-3">Email</div>
                <div class="cell-8"><input data-role="input" wire:model.defer="email_add" data-clear-button="true"
                        type="email">
                </div>
            </div>
            <div class="row">
                <div class="cell-3">Role</div>
                <div class="cell-8">
                    <select required data-role="select" onChange="update1()" id="option1">
                            <option value="">Select Role</option>
                            <option value="manager">Manager</option>
                            <option value="admin">Admin</option>
                            <option value="user">User</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="cell-3">Department</div>
                <div class="cell-8">
                    <select required data-role="select" onChange="update2()" id="option2">
                            <option value="">Select Department</option>
                            <option value="1">Production</option>
                            <option value="2">Quality Control</option>
                            <option value="3">Warehouse</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="cell-3">Password</div>
                <div class="cell-8"><input data-role="input" minlength="6" wire:model.defer="password1_add" data-clear-button="true"
                        required type="password"></div>
            </div>
            <div class="row">
                <div class="cell-8 offset-3"><input data-role="input" minlength="6" wire:model.defer="password2_add" data-clear-button="true"
                        required type="password"></div>
            </div>
        </div>
        <div class="dialog-actions">
            <button class="button primary" type="submit">Add User</button>
            <button class="button warning js-dialog-close">Cancel</button>
        </div>
        </form>
    </div>
    <!-- Dialog Edit User -->
    <div wire:ignore class="dialog" data-role="dialog" id="edit_user">
        <form wire:submit.prevent="edit">
        <div class="dialog-title">Edit User Data</div>
        <div class="dialog-content">
            <div class="row">
                <div class="cell-3">Name</div>
                <div class="cell-8"><input data-role="input" wire:model.defer="name_edit" id="name_edit" data-clear-button="false"
                        required required type="text">
                </div>
            </div>
            <div class="row">
                <div class="cell-3">Email</div>
                <div class="cell-8"><input data-role="input" wire:model.defer="email_edit" id="email_edit" data-clear-button="false"
                        type="email">
                </div>
            </div>
            <div class="row">
                <div class="cell-3">Role</div>
                <div class="cell-8">
                    <select required data-role="select" onChange="update3()" id="option3">
                            <option value="manager">Manager</option>
                            <option value="admin">Admin</option>
                            <option value="user">User</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="cell-3">Department</div>
                <div class="cell-8">
                    <select required data-role="select" onChange="update4()" id="option4">
                            <option value="1">Production</option>
                            <option value="2">Quality Control</option>
                            <option value="3">Warehouse</option>
                    </select>
                </div>
            </div>
            <div class="row border border-right-none border-top-none border-left-none pt-2"></div>
            <div class="row pt-2">
                <div class="cell-3">Password</div>
                <div class="cell-8"><input data-role="input" minlength="6" name="password1_edit" id="password1_edit" wire:model.defer="password1_edit"  data-clear-button="false"
                        required type="password"></div>
            </div>
            <div class="row">
                <div class="cell-8 offset-3"><input data-role="input" minlength="6" name="password2_edit" id="password2_edit" wire:model.defer="password2_edit" data-clear-button="false"
                        required type="password"></div>
            </div>
        </div>
        <div class="dialog-actions">
            <button type="submit" class="button success">Save</button>
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
                    <p>Are you Sure you wanna delete this user?</p>
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
            <button class="button alert" wire:click="delete">Delete User</button>
            <button class="button warning js-dialog-close">Cancel</button>
        </div>
    </div>
</div>