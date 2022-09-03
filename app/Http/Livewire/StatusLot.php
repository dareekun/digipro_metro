<?php

namespace App\Http\Livewire;
use Illuminate\Support\Facades\DB;

use Livewire\Component;

class StatusLot extends Component
{

    public $product_add;
    public $uid_delete;
    public $date_delete;
    public $product_delete;
    public $qty_delete;

    public function show_delete($id){
        $this->uid_delete     = $id;
        $this->product_delete = DB::table('production')->where('id', '$id')->value('modelno');
        $this->date_delete    = DB::table('production')->where('id', '$id')->value('lotno');
        $this->qty_delete     = DB::table('production')->where('id', '$id')->value('fg1');
        $this->dispatchBrowserEvent('open_dialog_delete', ['product' => $this->product_delete, 'date' => $this->date_delete, 'qty' => $this->qty_delete ]);
    }

    public function render()
    {
        $this->products = DB::table('product')->get();
        $this->datas = DB::table('production')->leftJoin('transaction', 'transaction.ProductionID', '=', 'production.id')->leftJoin('product', 'product.id', '=', 'production.modelno')
        ->select('production.id as id', 'production.name1 as pic', 'production.input1 as fg', 'production.ng1 as ng', 'production.lotno as lotno', 'production.shift as shift', 
        'product.product as product', 'product.line as line', )
        ->get();
        return view('livewire.status-lot');
    }
}
