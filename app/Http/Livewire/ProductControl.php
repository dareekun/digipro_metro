<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class ProductControl extends Component
{

    public $itteration = 0;

    public $product_add;
    public $line_add;
    public $section_add;
    public $cycle_add;
    public $man_add;

    public $product_edit;
    public $line_edit;
    public $section_edit;
    public $cycle_edit;
    public $man_edit;

    public $uid_delt;
    public $uid_edit;

    public $foo;
    
    protected $listeners = [
        'edit_open' => 'show_edit', 
        'delete_throw' => 'show_delete',
        'reload' => '$refresh'
    ];

    public function dehydrate() {
        $this->dispatchBrowserEvent('console_log', ['message' => 'Dehydrate is called']);
        // $this->dispatchBrowserEvent('reload');
    }

    public function show_add() {
        $this->product_add = NULL;
        $this->line_add = NULL;
        $this->section_add = NULL;
        $this->cycle_add = NULL;
        $this->man_add = NULL;
        $this->dispatchBrowserEvent('open_dialog_add');
    }

    public function add() {
        if (DB::table('product')->where('product', $this->product_add)->exists()) {
            $this->dispatchBrowserEvent('close_dialog_add');
            $this->dispatchBrowserEvent('toaster', ['message' => 'Error Product Already Exists', 'type' => 'alert']);
        } else {
            DB::table('product')->insert([
                'product' => $this->product_add,
                'line' => $this->line_add,
                'bagian' => $this->section_add,
                'time_proc' => $this->cycle_add,
                'std_mp' => $this->man_add,
            ]);
            $this->dispatchBrowserEvent('close_dialog_add');
            $this->dispatchBrowserEvent('toaster', ['message' => 'Product Successfully Add', 'type' => 'success']);
        }
    }

    public function show_edit($payload) {
        $this->uid_edit = $payload['data'];
        $this->product_edit = DB::table('product')->where('id', $this->uid_edit)->value('product');
        $this->line_edit = DB::table('product')->where('id', $this->uid_edit)->value('line');
        $this->section_edit = DB::table('product')->where('id', $this->uid_edit)->value('bagian');
        $this->cycle_edit = DB::table('product')->where('id', $this->uid_edit)->value('time_proc');
        $this->man_edit = DB::table('product')->where('id', $this->uid_edit)->value('std_mp');
        $this->dispatchBrowserEvent('open_dialog_edit');
    }

    public function edit() {
        $this->itteration++;
        if (DB::table('product')->where('id', '<>' ,$this->uid_edit)->where('product', $this->product_edit)->exists()) {
            $this->dispatchBrowserEvent('close_dialog_edit');
            $this->dispatchBrowserEvent('toaster', ['message' => 'Error Product Already Exists', 'type' => 'alert']);
        } else {
            DB::table('product')->where('id', $this->uid_edit)->update([
                'product' => $this->product_edit,
                'line' => $this->line_edit,
                'bagian' => $this->section_edit,
                'time_proc' => $this->cycle_edit,
                'std_mp' => $this->man_edit,
            ]);
            $this->dispatchBrowserEvent('close_dialog_edit');
            $this->dispatchBrowserEvent('toaster', ['message' => 'Product Successfully Add', 'type' => 'success']);
            $this->dispatchBrowserEvent('keep_pages');
        }
    }

    public function show_delete($payload){
        $this->uid_delt = $payload['data'];
        $product = DB::table('product')->where('id', $this->uid_delt)->value('product');
        $line    = DB::table('product')->where('id', $this->uid_delt)->value('line');
        $section = DB::table('product')->where('id', $this->uid_delt)->value('bagian');
        $this->dispatchBrowserEvent('open_dialog_delete', ['product' => $product, 'line' => $line, 'section' => $section]);
    }

    public function delete() {
        DB::table('product')->where('id', $this->uid_delt)->delete();
        $this->dispatchBrowserEvent('close_dialog_delete');
        $this->dispatchBrowserEvent('toaster', ['message' => 'Product Successfully delete', 'type' => 'warning']);
    }

    public function render()
    {
        $this->foo = DB::table('product')->get();
        return view('livewire.product-control', ['products' => $this->foo]);
    }
}
