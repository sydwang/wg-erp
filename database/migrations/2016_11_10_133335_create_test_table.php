<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //

        Schema::create('test',function($table){
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
        Schema::drop('test');
    }
}
