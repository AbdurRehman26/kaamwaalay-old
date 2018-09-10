<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUserRatingsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'user_ratings', function (Blueprint $table) {
                $table->increments('id');
                $table->boolean('rating');
                $table->text('message', 65535)->nullable();
                $table->integer('job_id')->unsigned()->nullable()->index();
                $table->integer('user_service_id')->unsigned()->nullable()->index();
                $table->integer('user_id')->unsigned()->index();
                $table->integer('rated_by')->unsigned()->index();
                $table->enum('status', array('pending','rejected','approved'))->default('pending');
                $table->timestamps();
                $table->softDeletes();
                $table->unique(['job_id' , 'rated_by'])->index();
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
        Schema::drop('user_ratings');
    }

}
