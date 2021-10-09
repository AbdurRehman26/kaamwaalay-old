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
                $table->enum('status', array('cancelled','completed', 'initiated', 'invited', 'on_the_way', 'pending', 'visit_allowed', 'suggested_time'))->default('pending');
                $table->date('preferred_date')->nullable();
                $table->time('preferred_time')->nullable();
                $table->date('suggested_date')->nullable();
                $table->time('suggested_time')->nullable();
                $table->text('visit_details')->nullable();
                $table->json('job_done_images', 65535)->nullable();
                $table->boolean('is_visit_required')->nullable()->default(false);
                $table->enum('amount_type', array('max','min', 'fixed'))->default('min');

                $table->timestamps();
                $table->softDeletes();
            }
        );
        DB::statement("ALTER TABLE `job_bids` ADD CONSTRAINT job_id_user_id_unique UNIQUE KEY(`job_id`,`user_id`)");

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
