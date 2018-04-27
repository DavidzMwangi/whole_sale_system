<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiscountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('discounts',function (Blueprint $table){
          $table->increments('id');
          $table->integer('product_id');
          $table->double('initial_product_selling_price');
          $table->double('new_discounted_selling_price');
          $table->double('discount_amount');
          $table->date('start_date');
          $table->date('end_date');
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
        Schema::dropIfExists('discounts');
    }
}
