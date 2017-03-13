<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('links', function (Blueprint $table) {
            $table->increments('id');
            $table->string('link_title');
            $table->string('link_url')->unique();
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
        Schema::table('links',function(Blueprint $table){
            $table->dropForeign('links_post_id_foreign');
        });

        Schema::drop('links');
    }
}
