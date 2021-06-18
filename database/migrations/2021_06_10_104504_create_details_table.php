<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailsTable extends Migration
{
    public function up()
    {
        Schema::create('details', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->foreignId("ticket_id")->constrained();
            $table->foreignId("product_id")->constrained();
            $table->integer("quantity");
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('details');
    }
}
