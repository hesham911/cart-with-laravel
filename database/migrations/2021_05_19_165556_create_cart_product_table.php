<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
            Schema::create('cart_product', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('cart_id')->unsigned();
                    $table->foreign('cart_id')->references('id')->on('carts')->cascadeOnDelete();
                $table->unsignedBigInteger('product_id')->unsigned();
                    $table->foreign('product_id')->references('id')->on('products')->cascadeOnDelete();
                $table->integer('quantity');
                $table->timestamps();
            });
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
            Schema::dropIfExists('cart_product');
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
