<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToUserRatingsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table(
            'user_ratings', function (Blueprint $table) {
                $table->foreign('job_id')->references('id')->on('jobs')->onUpdate('CASCADE')->onDelete('NO ACTION');
                $table->foreign('rated_by')->references('id')->on('users')->onUpdate('CASCADE')->onDelete('NO ACTION');
                $table->foreign('user_service_id')->references('id')->on('service_provider_services')->onUpdate('CASCADE')->onDelete('NO ACTION');
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
            'user_ratings', function (Blueprint $table) {
                $table->dropForeign('user_ratings_job_id_foreign');
                $table->dropForeign('user_ratings_rated_by_foreign');
                $table->dropForeign('user_ratings_user_service_id_foreign');
                $table->dropForeign('user_ratings_user_id_foreign');
            }
        );
    }

}
