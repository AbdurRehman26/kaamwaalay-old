<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToUsersTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table(
            'users', function (Blueprint $table) {
                $table->foreign('city_id')->references('id')->on('cities')->onUpdate('CASCADE')->onDelete('NO ACTION');
                $table->foreign('city_area_id')->references('id')->on('city_areas')->onUpdate('CASCADE')->onDelete('NO ACTION');
                $table->foreign('role_id')->references('id')->on('roles')->onUpdate('CASCADE')->onDelete('NO ACTION');
            }
        );
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table(
            'users', function (Blueprint $table) {
                $table->dropForeign('users_city_id_foreign');
                $table->dropForeign('users_city_area_id_foreign');
                $table->dropForeign('users_role_id_foreign');
            }
        );
    }

}
