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
        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('foodie_username');
            $table->unsignedBigInteger('restaurant_id');
            $table->string('meal_picture');
            $table->double('price', 8, 2);
            $table->double('rating', 8, 2);
            $table->text('review');
            $table->timestamps();

            $table->unique(['id', 'foodie_username']);

            $table->foreign('foodie_username')->references('username')
                ->on('foodies')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('restaurant_id')->references('id')
                ->on('restaurants')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
};
