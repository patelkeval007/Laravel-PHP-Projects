<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('description');
            $table->integer('qoh');
            $table->double('price');
            $table->integer('cat_id')->unsigned();
            $table->integer('color_id')->unsigned();
            $table->integer('design_id')->unsigned();
            $table->integer('supplier_id')->unsigned();
            $table->foreign('cat_id')->references('id')->on('categories');
            $table->foreign('color_id')->references('id')->on('colors');
            $table->foreign('design_id')->references('id')->on('designs');
            $table->foreign('supplier_id')->references('id')->on('suppliers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
