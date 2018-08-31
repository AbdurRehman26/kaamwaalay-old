<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToServiceProviderProfileRequestsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table(
            'service_provider_profile_requests', function (Blueprint $table) {
                $table->foreign('user_id')->references('id')->on('users')->onUpdate('CASCADE')->onDelete('NO ACTION')->index('FK_spp_r_user_id');
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
            'service_provider_profile_requests', function (Blueprint $table) {
                $table->dropForeign('FK_spp_r_user_id');
            }
        );
    }

}
