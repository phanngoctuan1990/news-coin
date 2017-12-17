<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateForeignCoinCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('coin')) {
            Schema::table('coin', function (Blueprint $table) {
                $table->foreign('category_coin_id', 'fk_coin_category_id')->references('id')->on('category_coin');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasTable('coin')) {
            Schema::table('coin', function (Blueprint $table) {
                $table->dropForeign('fk_coin_category_id');
            });
        }
    }
}
