<?php

namespace App\Http\Livewire;
use Illuminate\Support\Facades\DB;

use Livewire\Component;

class StatusLot extends Component
{
    public function render()
    {
        $this->datas = DB::table('production')->leftJoin('transaction', 'transaction.ProductionID', '=', 'production.id')->leftJoin('product', 'product.id', '=', 'production.modelno')
        ->select('production.id as id', 'production.name1 as pic', 'production.input1 as fg', 'production.ng1 as ng', 'production.lotno as lotno', 'production.shift as shift', 
        'product.product as product', 'product.line as line', )
        ->get();
        return view('livewire.status-lot');
    }
}
