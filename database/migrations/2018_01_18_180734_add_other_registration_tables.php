<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddOtherRegistrationTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       

    Schema::table('users', function($table)
    {
        $table->string('surname');
        $table->string('date_of_birth');
        $table->string('phone_number');
        $table->string('address');
        $table->string('city');
        $table->string('zip_code');
        $table->string('country');
    });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
        Schema::table('users', function($table){
        $table->dropColumn('surname');
        $table->dropColumn('date_of_birth');
        $table->dropColumn('phone_number');
        $table->dropColumn('address');
        $table->dropColumn('city');
        $table->dropColumn('zip_code');
        $table->dropColumn('country');
        });

    }
}
