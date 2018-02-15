<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCartAndOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->float('total_amount'); // static due of invoice
            $table->float('tax_amount');   // static due of invoice
      //      $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('carts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('token');
            $table->integer('order_id')->nullable()->unsigned();
            $table->integer('dish_id')->unsigned();
            $table->timestamps();

        });

        Schema::table('orders', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            
        });


        Schema::table('carts', function (Blueprint $table) {
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
            $table->foreign('dish_id')->references('id')->on('dishes')->onDelete('cascade');

           });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carts');
        Schema::dropIfExists('orders');
    }
}
