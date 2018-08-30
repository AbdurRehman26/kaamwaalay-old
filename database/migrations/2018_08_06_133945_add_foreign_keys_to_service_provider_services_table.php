<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToServiceProviderServicesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table(
            'service_provider_services', function (Blueprint $table) {
                $table->foreign('service_provider_profile_request_id')->references('id')->on('service_provider_profile_requests')->onUpdate('CASCADE')->onDelete('NO ACTION')->index('FK_sps_sppr_id');
                $table->foreign('service_id')->references('id')->on('services')->onUpdate('CASCADE')->onDelete('NO ACTION');
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
            'service_provider_services', function (Blueprint $table) {
                $table->dropForeign('FK_sps_sppr_id');
                $table->dropForeign('service_provider_services_service_id_foreign');
            }
        );
    }

}
