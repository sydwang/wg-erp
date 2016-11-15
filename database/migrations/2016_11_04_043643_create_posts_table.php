<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // The following code are added by charles
        // 4-11-2016
        Schema::create('posts',function($table){
            $table->increments('id');
            $table->string('title');
            $table->text('context');
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
        // The following code are added by charles
        // 4-11-2016
        Schema::drop('posts');
    }
}
