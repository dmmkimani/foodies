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
        Schema::create('comment_likes', function (Blueprint $table) {
            $table->primary(['comment_id', 'foodie_username']);
            $table->unsignedBigInteger('comment_id');
            $table->string('foodie_username');
            $table->timestamps();

            $table->foreign('comment_id')->references('id')
                ->on('comments')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('foodie_username')->references('username')
                ->on('foodies')
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
        Schema::dropIfExists('comment_likes');
    }
};
