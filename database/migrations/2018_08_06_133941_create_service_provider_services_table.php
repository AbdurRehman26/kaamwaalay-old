<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateServiceProviderServicesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'service_provider_services', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('service_provider_profile_request_id')->unsigned()->index('sppri');
                $table->integer('service_id')->unsigned()->nullable()->index();
                $table->timestamps();
                $table->softDeletes();

                $table->unique(['service_provider_profile_request_id' , 'service_id'])->index('sppui');

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
        Schema::drop('service_provider_services');
    }

}
