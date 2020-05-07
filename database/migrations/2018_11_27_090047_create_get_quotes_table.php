<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGetQuotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('get_quotes', function (Blueprint $table) {
            $table->increments('id');           
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->string('company')->nullable();
            $table->string('website')->nullable();
            $table->string('product');
            $table->string('message');       
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
        Schema::dropIfExists('get_quotes');
    }
}
