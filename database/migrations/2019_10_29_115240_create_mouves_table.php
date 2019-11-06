<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMouvesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mouves', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('description')->nullable();
            $table->string('url_video');
            $table->boolean('is_youtube')->default(0);

            $table->unsignedBigInteger('artiste_id')->nullable();
            $table->foreign('artiste_id')->references('id')->on('artistes')->onDelete('cascade');
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
        Schema::dropIfExists('mouves');
    }
}
