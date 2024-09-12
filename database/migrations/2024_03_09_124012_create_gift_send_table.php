<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGiftSendTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_gift_send', function (Blueprint $table) {
            $table->id();
            $table->integer('fk_event')->nullable();
            $table->integer('fk_event_gift')->nullable();
            $table->string('gift_type')->nullable();
            $table->float('amount')->nullable();
            $table->string('receipt_number')->nullable();
            $table->string('sender_name')->nullable();
            $table->text('note')->nullable();
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
        Schema::dropIfExists('event_gift_send');
    }
}
