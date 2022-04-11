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
            $table->primary(['comment_id', 'user_username']);
            $table->unsignedBigInteger('comment_id');
            $table->string('user_username');
            $table->timestamps();

            $table->foreign('comment_id')->references('id')
                ->on('comments')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('user_username')->references('username')
                ->on('users')
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
