<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDirectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('directions', function (Blueprint $table) {
            $table->id();
            $table->foreignId("user_id")->constrained();
            $table->string("id_region")->nullable();
            $table->string("region")->nullable();
            $table->string("id_ciudad")->nullable();
            $table->string("ciudad")->nullable();
            $table->string("id_calle")->nullable();
            $table->string("calle")->nullable();
            $table->integer("id_numero")->nullable();
            $table->integer("numero")->nullable();
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
        Schema::dropIfExists('directions');
    }
}
