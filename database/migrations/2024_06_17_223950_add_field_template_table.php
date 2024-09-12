<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldTemplateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('templates', function($table) {
            $table->double('original_price')->default(0)->after('image')->nullable();
            $table->double('markup_price')->default(0)->after('image')->nullable();
            $table->integer('discount')->default(0)->after('image')->nullable();
            $table->integer('is_featured')->default(0)->after('image')->nullable();
            $table->integer('used_count')->default(0)->after('image')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('templates', function($table) {
            $table->dropColumn('original_price')->nullable();
            $table->dropColumn('markup_price')->nullable();
            $table->dropColumn('discount')->nullable();
            $table->dropColumn('is_featured')->nullable();
            $table->dropColumn('used_count')->nullable();
        });
    }
}
