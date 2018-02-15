<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SetOrderStatusNullable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
       
        Schema::table('orders', function($table)
        {
            $table->string('order_status')->nullable()->change();
        });

        }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
          Schema::table('orders', function($table)
        {
            $table->string('order_status')->nullable(false)->change();
        });

    }
}




//>nullable(false)