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
        Schema::create('other_sections', function (Blueprint $table) {
            $table->id();
            $table->string("sec_name");
            $table->string("sec_title");
            $table->text("sec_des")->nullable();
            $table->text("sec_des2")->nullable();
            $table->string("section_image")->nullable();
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
        Schema::dropIfExists('other_sections');
    }
};
