<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventGalleryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_gallery', function (Blueprint $table) {
            $table->id();
            $table->integer('fk_event')->nullable();
            $table->integer('type')->comment('1:gallery, 2:header')->default(1)->nullable();
            $table->string('name')->nullable();
            $table->string('path')->nullable();
            $table->integer('active')->default(1)->nullable();
            $table->integer('created_by')->nullable();
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
        Schema::dropIfExists('event_gallery');
    }
}
