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
            $table->integer('supplies_id');
            $table->double('product_supplied_amount');
            $table->date('expiry_date')->nullable();
            $table->double('single_product_price_buying_price');
            $table->double('single_product_price_selling_price');
            $table->double('product_size');
            $table->boolean('has_discount')->default(false);
            $table->boolean('has_expired')->default(false);
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
        Schema::dropIfExists('products');
    }
}
