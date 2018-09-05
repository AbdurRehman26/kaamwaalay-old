<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateServiceProviderProfileRequestsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'service_provider_profile_requests', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('user_id')->unsigned()->index();
                $table->text('reason', 65535)->nullable();
                $table->integer('approved_by')->nullable()->unsigned();
                $table->dateTime('approved_at')->nullable();
                $table->enum('status', array('approved','pending','rejected','in-review'))->default('pending');
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
        Schema::drop('service_provider_profile_requests');
    }

}
