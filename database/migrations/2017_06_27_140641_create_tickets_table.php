<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
       Schema::create('tickets', function (Blueprint $table) {
           $table->increments('id');
           $table->integer('listingId')->unsigned();
           $table->integer('fromUserId')->nullable()->unsigned();
           $table->integer('boughtByUserId')->nullable()->unsigned();
           $table->dateTime('boughtAtDate')->nullable();
           $table->rememberToken();
           $table->timestamps();
       });

       Schema::table('tickets', function(Blueprint $table) {
            $table->foreign('listingId')->references('id')->on('listings')->onDelete('cascade');
            $table->foreign('fromUserId')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('boughtByUserId')->references('id')->on('users')->onDelete('cascade');
        });
     }

     /**
      * Reverse the migrations.
      *
      * @return void
      */
     public function down()
     {
       Schema::dropIfExists('tickets');
     }
}
