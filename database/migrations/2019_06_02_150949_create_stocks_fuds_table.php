<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStocksFudsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stocks_fuds', function (Blueprint $table) {
            $table->bigIncrements('stock_id');
            $table->string('pro_name');
            $table->integer('cant_pro');
            $table->integer('num_lote');
            $table->integer('price');
            $table->date('date_exp');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stocks_fuds');
    }
}
