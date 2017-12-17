<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateForeignUserRoleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('user_role')) {
            Schema::table('user_role', function (Blueprint $table) {
                $table->foreign('user_id', 'fk_user_role_user_id')->references('id')->on('users')->onDelete('cascade');
                $table->foreign('role_id', 'fk_user_role_role_id')->references('id')->on('role')->onDelete('cascade');
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
        if (Schema::hasTable('user_role')) {
            Schema::table('user_role', function (Blueprint $table) {
                $table->dropForeign('fk_user_role_user_id');
                $table->dropForeign('fk_user_role_role_id');
            });
        }
    }
}
