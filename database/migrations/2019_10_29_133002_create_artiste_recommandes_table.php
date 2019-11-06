<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArtisteRecommandesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('artiste_recommandes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nom');
            $table->string('photo_principale');
            $table->text('description')->nullable();
            $table->string('lien_facebook')->nullable();
            $table->string('lien_instagram')->nullable();
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
        Schema::dropIfExists('artiste_recommandes');
    }
}
