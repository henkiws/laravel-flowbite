<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventLoveStoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_love_story', function (Blueprint $table) {
            $table->id();
            $table->integer('fk_event')->nullable();
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->datetime('date')->nullable();
            $table->integer('position')->nullable();
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
        Schema::dropIfExists('event_love_story');
    }
}
