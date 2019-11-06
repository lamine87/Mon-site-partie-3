<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTagMouvesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tag_mouves', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('description')->nullable();
            $table->string('url_video');
            $table->boolean('is_youtube')->default(0);

            $table->unsignedBigInteger('media_tag_id')->nullable();
            $table->foreign('media_tag_id')->references('id')->on('media_tags')->onDelete('set null');
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
        Schema::dropIfExists('tag_mouves');
    }
}
