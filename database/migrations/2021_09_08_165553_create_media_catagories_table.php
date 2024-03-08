<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMediaCatagoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('media_catagories', function (Blueprint $table) {
            $table->id();
            $table->integer('proj_id');
            $table->integer('parent_id')->default(0);
            $table->string('type', 20)->default('catagory');
            $table->string('name');
            $table->string('description')->nullable();
            $table->string('thumbnail');
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
        Schema::dropIfExists('media_catagories');
    }
}
