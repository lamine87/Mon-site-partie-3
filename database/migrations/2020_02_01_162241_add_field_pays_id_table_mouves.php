<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldPaysIdTableMouves extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mouves', function (Blueprint $table) {
            //
            $table->unsignedBigInteger('pays_id')->nullable();
            $table->foreign('pays_id')->references('id')->on('pays')->onDelete('set null');
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
        Schema::table('mouves', function (Blueprint $table) {
            //
        });
    }
}
