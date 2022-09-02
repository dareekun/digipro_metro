<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ProductionJob extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('production', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('modelno');
            $table->string('shift');
            $table->date('lotno'); 
            $table->string('line'); 
            $table->json('partname');
            $table->integer('input1')->nullable();
            $table->integer('input2')->nullable();
            $table->integer('ng1')->nullable();
            $table->integer('ng2')->nullable();
            $table->date('date1');
            $table->date('date2');
            $table->string('name1');
            $table->string('name2');
            $table->boolean('status')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
