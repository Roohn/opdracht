<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBarcodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('barcodes', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('ticketId')->unsigned();
          $table->string('barcode');
          $table->rememberToken();
          $table->timestamps();
      });

      Schema::table('barcodes', function(Blueprint $table) {
           $table->foreign('ticketId')->references('id')->on('tickets')->onDelete('cascade');
       });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('barcodes');
    }
}
