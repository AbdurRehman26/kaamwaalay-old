<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToCampaignsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table(
            'campaigns', function (Blueprint $table) {
                $table->foreign('plan_id')->references('id')->on('plans')->onUpdate('CASCADE')->onDelete('NO ACTION');
                $table->foreign('user_id')->references('id')->on('users')->onUpdate('CASCADE')->onDelete('NO ACTION');
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
            'campaigns', function (Blueprint $table) {
                $table->dropForeign('campaigns_plan_id_foreign');
                $table->dropForeign('campaigns_user_id_foreign');
            }
        );
    }

}
