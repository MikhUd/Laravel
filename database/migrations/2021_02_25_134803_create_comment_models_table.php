<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comment_models', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->biginteger('task_id')->unsigned();
            $table->foreign('task_id')->references('id')->on('posts_models')->onDelete('cascade');
            $table->text('body');
            $table->text('author_name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comment_models');
    }
}
