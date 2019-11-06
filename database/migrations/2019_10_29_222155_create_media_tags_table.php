<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMediaTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('media_tags', function (Blueprint $table) {
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
        Schema::dropIfExists('media_tags');
    }
}
