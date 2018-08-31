<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToPaymentsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table(
            'payments', function (Blueprint $table) {
                $table->foreign('job_id')->references('id')->on('jobs')->onUpdate('CASCADE')->onDelete('NO ACTION');
                $table->foreign('pay_by')->references('id')->on('users')->onUpdate('CASCADE')->onDelete('NO ACTION');
                $table->foreign('plan_id')->references('id')->on('plans')->onUpdate('CASCADE')->onDelete('NO ACTION');
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
            'payments', function (Blueprint $table) {
                $table->dropForeign('payments_job_id_foreign');
                $table->dropForeign('payments_pay_by_foreign');
                $table->dropForeign('payments_plan_id_foreign');
                $table->dropForeign('payments_service_id_foreign');
            }
        );
    }

}
