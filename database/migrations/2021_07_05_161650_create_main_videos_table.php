<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMainVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('main_videos', function (Blueprint $table) {
            $table->id();
            $table->integer('proj_id');
            $table->text('description')->nullable();
            $table->string('type')->default('youtube');
            $table->json('playlist');
            $table->json('playlist_http')->nullable();
            $table->boolean('status');
            $table->timestamps();
            $table->bigInteger('user_id')->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('main_videos');
    }
}
