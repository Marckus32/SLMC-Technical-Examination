<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id('id');
            $table->string('name');
            $table->string('username');
            $table->string('email')->unique();
            
            $table->string('street');
            $table->string('suite');
            $table->string('city');
            $table->string('zipcode');
            $table->string('geo_lat');
            $table->string('geo_lang');

            $table->string('phone');
            $table->string('website');
            
            $table->string('company_name');
            $table->string('company_catchPhrase');
            $table->string('company_bs');
            
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
        Schema::dropIfExists('users');
    }
}
