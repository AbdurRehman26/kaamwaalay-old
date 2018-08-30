<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateJobsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'jobs', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('user_id')->unsigned()->index();
                $table->integer('service_id')->unsigned()->index();
                $table->integer('country_id')->unsigned()->nullable()->index();
                $table->integer('state_id')->unsigned()->nullable()->index();
                $table->integer('city_id')->unsigned()->nullable()->index();
                $table->string('title');
                $table->string('description');
                $table->string('address')->nullable();
                $table->string('apartment')->nullable();
                $table->string('zip_code');
                $table->json('images', 65535)->nullable();
                $table->json('videos', 65535)->nullable();
                $table->dateTime('schedule_at')->nullable();
                $table->enum('preference', array('with_in_a_week','few_days','choose_date','any_time'))->default('choose_date');
                $table->enum('status', array('awarded','initiated','in_bidding','completed','cancelled'))->default('in_bidding');
                $table->enum('job_type', array('normal','urgent'))->default('normal');
                $table->decimal('min_amount', 10, 2)->nullable();
                $table->decimal('max_amount', 10, 2)->nullable();
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
        Schema::drop('jobs');
    }

}
