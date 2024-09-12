<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventLocationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_location', function (Blueprint $table) {
            $table->id();
            $table->integer('fk_event')->nullable();
            $table->string('name')->nullable();
            $table->string('day')->nullable();
            $table->string('time')->nullable();
            $table->datetime('date')->nullable();
            $table->text('location')->nullable();
            $table->text('maps')->nullable();
            $table->integer('active')->nullable();
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
        Schema::dropIfExists('event_location');
    }
}
