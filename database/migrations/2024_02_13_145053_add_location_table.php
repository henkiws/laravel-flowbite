<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddLocationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('event_location', function($table) {
            $table->text('address')->after('location')->nullable();
            $table->integer('is_live')->default(0)->after('maps')->nullable();
            $table->text('link_live')->after('is_live')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('event_location', function($table) {
            $table->dropColumn('address')->nullable();
            $table->dropColumn('is_live')->nullable();
            $table->dropColumn('link_live')->nullable();
        });
    }
}
