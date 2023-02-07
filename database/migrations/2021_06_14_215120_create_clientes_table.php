<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->string('rut', 100)->unique();
            $table->string('email', 100);
            $table->unsignedBigInteger('estado');
            $table->string('name');
            $table->string('primary_phone', 50);
            $table->string('secondary_phone', 50)->nullable();
            $table->string('category');
            $table->string('website')->nullable();
            $table->string('address')->nullable();
            $table->string('contact_name', 100)->nullable();
            $table->string('type')->nullable();
            $table->string('region_id');
            $table->string('comuna_id');

            //$table->foreign('region_id')->references('id')->on('locations');
            //$table->foreign('comuna_id')->references('parent_id')->on('locations');
            //$table->foreignId('state_id')->constrained('locations');
            //$table->foreignId('city_id')->constrained('locations');
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
        Schema::dropIfExists('clientes');
    }
}
