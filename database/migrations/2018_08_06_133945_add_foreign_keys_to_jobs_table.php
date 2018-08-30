<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToJobsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table(
            'jobs', function (Blueprint $table) {
                $table->foreign('city_id')->references('id')->on('cities')->onUpdate('CASCADE')->onDelete('NO ACTION');
                $table->foreign('country_id')->references('id')->on('countries')->onUpdate('CASCADE')->onDelete('NO ACTION');
                $table->foreign('service_id')->references('id')->on('services')->onUpdate('CASCADE')->onDelete('NO ACTION');
                $table->foreign('state_id')->references('id')->on('states')->onUpdate('CASCADE')->onDelete('NO ACTION');
                $table->foreign('user_id')->references('id')->on('users')->onUpdate('CASCADE')->onDelete('NO ACTION');
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
            'jobs', function (Blueprint $table) {
                $table->dropForeign('jobs_city_id_foreign');
                $table->dropForeign('jobs_country_id_foreign');
                $table->dropForeign('jobs_service_id_foreign');
                $table->dropForeign('jobs_state_id_foreign');
                $table->dropForeign('jobs_user_id_foreign');
            }
        );
    }

}
