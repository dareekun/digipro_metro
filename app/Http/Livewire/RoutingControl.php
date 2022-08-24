<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class RoutingControl extends Component
{

    public $user_add;
    public $department_add;

    public $user_temp;

    public $user_edit;
    public $department_edit;
    
    public $uid_edit;
    public $uid_delete;

    public function show_add(){    
        $this->user_add = NULL;
        $this->department_add = NULL;
        $this->level_add = NULL;
        $this->dispatchBrowserEvent('open_dialog_add');
    }

    public function add(){
        $levelc = DB::table('routing_list')->where('departmentID', 0)->count();
        $levela = DB::table('routing_list')->where('departmentID', $this->department_add)->count();
        $ltotes = $levela + $levelc;
        DB::table('routing_list')->insert([
            'userID' => $this->user_add,
            'departmentID' => $this->department_add,
            'level' => $ltotes
        ]);
    }

    public function render()
    {
        $this->users = DB::table('users')->where('department', '<>', 999)->get();
        $this->routers = DB::table('routing_list')->join('users', 'users.id', '=', 'routing_list.userID')->join('department_list', 'department_list.id', '=', 'routing_list.departmentID')
        ->select('routing_list.id as id', 'users.username as nik', 'users.name as name', 'department_list.department as department', 'routing_list.level as level')->get();
        return view('livewire.routing-control');
    }
}
