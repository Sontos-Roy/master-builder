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
        Schema::create('quat_sections', function (Blueprint $table) {
            $table->id();
            $table->text("persor_speech");
            $table->string("persor_name");
            $table->string("persor_designation");
            $table->string("feature_image");
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
        Schema::dropIfExists('quat_sections');
    }
};
