<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class RoutingControl extends Component
{
    

    public function render()
    {
        $this->users = DB::table('users')->where('departmentID', '<>', 999)->get();
        $this->routers = DB::table('routing_list')->join('users', 'users.id', '=', 'routing_list.userID')->join('department_list', 'department_list.id', '=', 'routing_list.departmentID')
        ->select('routing_list.id as id', 'users.username as nik', 'users.name as name', 'department_list.department as department', 'routing_list.level as level')->get();
        return view('livewire.routing-control');
    }
}
