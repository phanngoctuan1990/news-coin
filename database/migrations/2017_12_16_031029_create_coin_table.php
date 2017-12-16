<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoinTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('coin')) {
            Schema::create('coin', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name');
                $table->string('thumbnail');
                $table->float('rate');
                $table->tinyInteger('hype')->comment('0 is very low, 1 is low, 2 is mid, 3 is high, 4 is very high');
                $table->tinyInteger('scam')->comment('0 is very low, 1 is low, 2 is mid, 3 is high, 4 is very high');
                $table->tinyInteger('moom')->comment('0 is very low, 1 is low, 2 is mid, 3 is high, 4 is very high');
                $table->date('start_date');
                $table->date('end_date');
                $table->tinyInteger('stage')->comment('0 is ended, 1 is exchange, 2 is ico, 3 is ico today, 4 is scam');
                $table->decimal('price', 8, 2);
                $table->string('round');
                $table->timestamps();
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
            Schema::drop('coin');
        }
    }
}
