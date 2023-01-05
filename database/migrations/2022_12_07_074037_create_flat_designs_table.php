<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flat_designs', function (Blueprint $table) {
            $table->id();
            $table->string('description')->nullable();
            $table->string("total_area")->nullable();
            $table->string("total_floor")->nullable();
            $table->string("parking_lot")->nullable();
            $table->string("social_area")->nullable();
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
        Schema::dropIfExists('flat_designs');
    }
};
