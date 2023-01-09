<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Ramsey\Uuid\Type\Integer;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phase', function (Blueprint $table) {
            $table->increments('id_phase');
            $table->string('nom');
            $table->integer('duree');
            $table->enum('priorite',array('Elevee','Moyenne','Faible'));
            $table->unsignedBigInteger('id');
            $table->timestamps();
        
            $table->foreign('id')->references('id')->on('projet')->onDelete('cascade');
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('phase');
    }
};
