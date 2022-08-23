<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Auth;

class LogRecord extends Component
{
    public function render()
    {
        if (Auth::user()->role == 'developer') {
            $this->records = DB::table('record')->orderBy('time', 'desc')->get();
        } else {
            $this->records = [];
        }
        return view('livewire.log-record');
    }
}
