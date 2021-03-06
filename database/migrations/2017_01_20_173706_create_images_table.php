<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('images', function (Blueprint $table) {
            $table->increments('id');
            $table->string('image_title',80);
            $table->string('image')->unique();
            $table->integer('post_id')->unsigned();
            $table->foreign('post_id')
                ->references('id')
                ->on('posts')
                ->onDelete('restrict')
                ->onUpdate('restrict');
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
        Schema::table('images',function(Blueprint $table){
            $table->dropForeign('images_post_id_foreign');
        });

        Schema::drop('images');
    }
}
