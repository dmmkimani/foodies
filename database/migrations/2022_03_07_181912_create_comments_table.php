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
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->string('foodie_username');
            $table->unsignedBigInteger('post_id');
            $table->text('comment');
            $table->integer('likes');
            $table->timestamps();
        
            $table->foreign('foodie_username')->references('username')
                ->on('foodies')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            
            $table->foreign('post_id')->references('id')
                ->on('posts')
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
        Schema::dropIfExists('comments');
    }
};