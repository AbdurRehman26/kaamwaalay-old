<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToJobBidsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table(
            'job_bids', function (Blueprint $table) {
                $table->foreign('job_id')->references('id')->on('jobs')->onUpdate('CASCADE')->onDelete('NO ACTION');
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
            'job_bids', function (Blueprint $table) {
                $table->dropForeign('job_bids_job_id_foreign');
                $table->dropForeign('job_bids_user_id_foreign');
            }
        );
    }

}
