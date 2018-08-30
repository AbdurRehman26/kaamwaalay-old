<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateJobMessagesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'job_messages', function (Blueprint $table) {
                $table->increments('id');
                $table->text('text', 65535);
                $table->integer('sender_id')->unsigned()->index();
                $table->integer('job_id')->unsigned()->index();
                $table->integer('reciever_id')->unsigned()->index();
                $table->integer('job_bid_id')->unsigned()->nullable()->index();
                $table->timestamps();
                $table->softDeletes();
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
        Schema::drop('job_messages');
    }

}
