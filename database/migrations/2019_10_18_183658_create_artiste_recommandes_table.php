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
            $table->string('lien_facebook');
            $table->string('lien_instagram');
            $table->boolean('is_online')->default(0);

            $table->unsignedBigInteger('movis_id');
            $table->foreign('movis_id')->references('id')->on('movis')->onDelete('cascade');
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
