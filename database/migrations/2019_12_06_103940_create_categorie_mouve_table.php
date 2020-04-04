<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategorieMouveTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categorie_mouve', function (Blueprint $table) {
            $table->unsignedBigInteger('categorie_id')->nullable();
            $table->foreign('categorie_id')->references('id')->on('categories')->onDelete('cascade');

            $table->unsignedBigInteger('mouve_id')->nullable();
            $table->foreign('mouve_id')->references('id')->on('mouves')->onDelete('cascade');
            $table->primary(['categorie_id','mouve_id']);

            Schema::enableForeignKeyConstraints();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categorie_mouve');
    }
}
