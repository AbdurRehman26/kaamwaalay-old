<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateJobBidsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'job_bids', function (Blueprint $table) {
                $table->increments('id');
                $table->text('description', 65535)->nullable();
                $table->decimal('amount', 10)->unsigned()->nullable();
                $table->boolean('is_tbd')->default(0);
                $table->integer('job_id')->unsigned()->index();
                $table->boolean('is_awarded')->default(0);
                $table->boolean('is_invited')->default(0);
                $table->integer('user_id')->unsigned()->index();
                $table->boolean('is_archived')->default(0);
                $table->enum('status', array('cancelled','pending','completed','invited','on_the_way'))->default('pending');
                $table->date('preferred_date')->nullable();
                $table->time('preferred_time')->nullable();

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
        Schema::drop('job_bids');
    }

}
