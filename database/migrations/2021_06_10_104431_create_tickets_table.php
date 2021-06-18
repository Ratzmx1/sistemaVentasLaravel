<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketsTable extends Migration
{
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->integer("total");
            $table->foreignId("user_id")->constrained();
            $table->enum('state',['PAGADO','PENDIENTE DE PAGO'])->default('PENDIENTE DE PAGO');
            $table->string("token_ws")->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tickets');
    }
}
