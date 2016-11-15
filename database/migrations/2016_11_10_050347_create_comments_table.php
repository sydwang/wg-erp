<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        // The following code are added by charles
        // 10-11-2016
        Schema::create('comments',function($table){
            $table->increments('id');
            $table->string('name');
            $table->text('content');
            $table->unsignedinteger('post_id');
            $table->foreign('post_id')
                    ->references('id')->on('posts')
                    ->onDelete('cascade');
            $table->timestamps('');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::drop('comments');
    }
}
