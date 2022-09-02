<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class Dashboard extends Component
{
    // 0 on produdction
    // 1 on quality checking
    // 2 judgement ok
    // 3 judgement ng
    // 4 judgement hold
    // 5 transfers
    public function render()
    {
        $this->datas = DB::table('production')->leftJoin('product', 'product.id', '=', 'production.modelno')
        ->select('product.product as product', 'production.lotno as date', 'production.shift as shift', 
        'production.input1 as qty', 'production.name1 as pic', 'production.status as status')
        ->get();
        return view('livewire.dashboard');
    }
}
