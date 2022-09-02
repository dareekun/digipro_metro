<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class UserControl extends Component
{
    public $name_add;
    public $nik_add;
    public $email_add;
    public $role_add;
    public $department_add;
    public $password1_add;
    public $password2_add;

    public $id_delete;

    public $id_edit;
    public $name_edit;
    public $email_edit;
    public $role_edit;
    public $department_edit;
    public $password1_edit;
    public $password2_edit;
        
    protected $listeners = [
        'edit_open' => 'show_edit', 
        'delete_open' => 'show_delete',
        'rubah' => 'change'
    ];

    public function show_add(){
        $this->name_add = NULL;
        $this->nik_add = NULL;
        $this->email_add = NULL;
        $this->role_add = NULL;
        $this->department_add = NULL;
        $this->password1_add = NULL;
        $this->password2_add = NULL;
        $this->dispatchBrowserEvent('open_dialog_add');
    }

    public function add() {
        if (DB::table('user')->where('username', $this->nik_add)->doesntExist() || DB::table('user')->where('email', $this->email_add)->doesntExist()) {
            DB::table('users')->insert([
                'name' => $this->name_add,
                'username' => $this->nik_add,
                'departmentID' => $this->department_add,
                'email' => $this->email_add,
                'line' => 0,
                'role' => $this->role_add,
            ]);
            $this->dispatchBrowserEvent('toaster', ['message' => 'User Successfully Added', 'type' => 'success']);
            $this->dispatchBrowserEvent('close_dialog_add');
        } else {
            $this->dispatchBrowserEvent('toaster', ['message' => 'Error Data Already Exists', 'type' => 'alert']);
        }
    }

    public function show_edit($payload){
        $this->id_edit         = $payload['data'];
        $this->name_edit       = DB::table('users')->where('id', $this->id_edit)->value('name');
        $this->email_edit      = DB::table('users')->where('id', $this->id_edit)->value('email');
        $this->department_edit = DB::table('users')->where('id', $this->id_edit)->value('department');
        $this->role_edit       = DB::table('users')->where('id', $this->id_edit)->value('role');
        $this->password1_edit  = NULL;
        $this->password2_edit  = NULL;
        $this->dispatchBrowserEvent('open_dialog_edit', ['department' => $this->department_edit, 'role' => $this->role_edit ]);
    }

    public function edit(){
        $i = 0;
            if ($this->email_edit != DB::table('users')->where('id', $this->id_edit)->value('email')) {
                if (DB::table('users')->where('id', '<>', $this->id_edit)->where('email', $this->email_edit)->exists()) {
                    $this->dispatchBrowserEvent('toaster', ['message' => "Error Email Already Exists", 'type' => 'alert']);
                    $i++;
                } else {
                    $this->validateOnly($this->email_edit);
                    DB::table('users')->where('id', $this->id_edit)->update([
                        'email' => $this->email_edit,
                    ]);
                }
            }
            if ($this->password1_edit != NULL || $this->password2_edit != NULL) {
                if ($this->password1_edit != $this->password2_edit) {
                    $this->dispatchBrowserEvent('toaster', ['message' => "Password didn't Match", 'type' => 'alert']);
                    $i++;
                } else {
                    DB::table('users')->where('id', $this->id_edit)->update([
                        'password' => bcrypt($this->password2_edit),
                    ]);
                }
            }
            if ($i == 0) {
                DB::table('users')->where('id', $this->id_edit)->update([
                    'name' => $this->name_edit,
                    'departmentID' => $this->department_edit,
                    'role' => $this->role_edit,
                ]);
                $this->dispatchBrowserEvent('toaster', ['message' => "Data User Successfully Save", 'type' => 'success']);
                $this->dispatchBrowserEvent('close_dialog_edit');
            } else {
                // DO Nothing
            }
    }

    public function show_delete($payload){
        $this->id_delete   = $payload['data'];
        $name_delete       = DB::table('users')->where('id', $this->id_delete)->value('name');
        $nik_delete        = DB::table('users')->where('id', $this->id_delete)->value('username');
        $department_delete = DB::table('users')->leftJoin('department_list', 'users.department', '=', 'department_list.id')->where('users.id', $this->id_delete)->value('department_list.department');
        $this->dispatchBrowserEvent('open_dialog_delete', ['name' => $name_delete, 'nik' => $nik_delete, 'department' => $department_delete]);
    }

    public function delete(){
        DB::table('users')->where('id', $this->id_delete)->delete();
        $this->dispatchBrowserEvent('toaster', ['message' => 'User Successfully Deleted', 'type' => 'warning']);
        $this->dispatchBrowserEvent('close_dialog_delete');
    }

    public function change($payload){
        if ($payload['pos'] == 1) {
            $this->role_add = $payload['data'];
        } elseif ($payload['pos'] == 2) {
            $this->department_add = $payload['data'];
        } elseif ($payload['pos'] == 3) {
            $this->role_edit = $payload['data'];
        } else {
            $this->department_edit = $payload['data'];
        }
    }

    public function render()
    {
        $this->users = DB::table('users')->leftJoin('department_list', 'users.department', '=', 'department_list.id')->where('users.department', '<>', 999)
        ->select('users.id as id', 'users.name as name', 'users.username as username', 'users.role as role', 'department_list.department as department', 
        'users.email as email')->get();
        return view('livewire.user-control');
    }
}