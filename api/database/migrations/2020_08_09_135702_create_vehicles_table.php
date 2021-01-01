<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('model_id')->unsigned();
            $table->bigInteger('fuel_type_id')->unsigned();
            $table->string('year')->nullable();
            $table->text('description')->nullable();
            $table->decimal('price');
            $table->date('sold')->nullable();
            $table->string('colour');

            $table->foreign('model_id')->references('id')->on('models')->onDelete('cascade');
            $table->foreign('fuel_type_id')->references('id')->on('fuel_types')->onDelete('cascade');

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
        Schema::dropIfExists('vehicles');
    }
}
