<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToJobMessagesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table(
            'job_messages', function (Blueprint $table) {
                $table->foreign('job_bid_id')->references('id')->on('job_bids')->onUpdate('NO ACTION')->onDelete('NO ACTION');
                $table->foreign('job_id')->references('id')->on('jobs')->onUpdate('CASCADE')->onDelete('NO ACTION');
                $table->foreign('reciever_id')->references('id')->on('users')->onUpdate('CASCADE')->onDelete('NO ACTION');
                $table->foreign('sender_id')->references('id')->on('users')->onUpdate('CASCADE')->onDelete('NO ACTION');
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
            'job_messages', function (Blueprint $table) {
                $table->dropForeign('job_messages_job_bid_id_foreign');
                $table->dropForeign('job_messages_job_id_foreign');
                $table->dropForeign('job_messages_reciever_id_foreign');
                $table->dropForeign('job_messages_sender_id_foreign');
            }
        );
    }

}
