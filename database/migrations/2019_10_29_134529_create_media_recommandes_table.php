<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMediaRecommandesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('media_recommandes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('description')->nullable();
            $table->string('url_video');
            $table->boolean('is_youtube')->default(0);

            $table->unsignedBigInteger('artiste_recommande_id')->nullable();
            $table->foreign('artiste_recommande_id')->references('id')->on('artiste_recommandes')->onDelete('cascade');
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
        Schema::dropIfExists('media_recommandes');
    }
}
