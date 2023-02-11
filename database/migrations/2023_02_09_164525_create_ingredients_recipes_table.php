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
        Schema::create('ingredients_recipes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ingredients_id');
            $table->unsignedBigInteger('recipes_id');
            $table->foreign('ingredients_id')->references('id')
                ->on('ingredients')->onDelete('cascade');
            $table->foreign('recipes_id')->references('id')->on('recipes')
                ->onDelete('cascade');
            $table->integer('quantity');
            $table->string('state')->default('Preparable');
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
        Schema::dropIfExists('ingredients_recipes');
    }
};
