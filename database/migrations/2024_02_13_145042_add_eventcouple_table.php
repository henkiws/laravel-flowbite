<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddEventcoupleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('event_couple', function($table) {
            $table->string('nickname')->after('name')->nullable();
            $table->text('address')->after('photo')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('event_couple', function($table) {
            $table->dropColumn('nickname')->nullable();
            $table->dropColumn('address')->nullable();
        });
    }
}
