<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateServiceProviderProfilesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'service_provider_profiles', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('user_id')->unsigned()->index();
                $table->json('attachments', 65535)->nullable();
                $table->string('business_name', 50)->nullable();
                $table->text('business_details', 65535)->nullable();
                $table->string('duns_number', 50)->nullable();
                $table->string('years_of_experience', 50)->nullable();
                $table->enum('business_type', array('business','individual'));
                $table->boolean('is_featured')->nullable()->default(0);
                $table->boolean('is_verified')->nullable()->default(0);
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
        Schema::drop('service_provider_profiles');
    }

}
