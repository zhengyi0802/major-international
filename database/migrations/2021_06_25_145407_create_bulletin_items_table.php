<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBulletinItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bulletin_items', function (Blueprint $table) {
            $table->id();
            $table->integer('bulletin_id')->default(0);
            $table->string('mime_type')->default('image');
            $table->string('url');
            $table->string('url_http')->nullable();
            $table->boolean('status')->default(false);
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
        Schema::dropIfExists('bulletin_items');
    }
}
