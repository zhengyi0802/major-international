<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStartpagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('startpages', function (Blueprint $table) {
            $table->id();
            $table->integer('proj_id');
            $table->string('name');
            $table->string('mime_type');
            $table->string('url');
            $table->string('url_http')->nullable();
            $table->text('descriptions')->nullable();
            $table->integer('intervals')->default(15);
            $table->boolean('status')->default(0);
            $table->datetime('start_time')->nullable();
            $table->datetime('stop_time')->nullable();
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
        Schema::dropIfExists('startpages');
    }
}
