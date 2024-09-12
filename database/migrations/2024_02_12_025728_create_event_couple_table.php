<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventCoupleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_couple', function (Blueprint $table) {
            $table->id();
            $table->integer('fk_event')->nullable();
            $table->string('type')->comment('groom, bridge, etc')->nullable();
            $table->string('name')->nullable();
            $table->string('child')->nullable();
            $table->string('father')->nullable();
            $table->string('mother')->nullable();
            $table->text('photo')->nullable();
            $table->text('instagram')->nullable();
            $table->text('facebook')->nullable();
            $table->text('twitter')->nullable();
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
        Schema::dropIfExists('event_couple');
    }
}
