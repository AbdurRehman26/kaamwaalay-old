<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePaymentsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'payments', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('amount')->unsigned();
                $table->integer('pay_by')->unsigned()->index();
                $table->integer('service_id')->unsigned()->nullable()->index();
                $table->integer('job_id')->unsigned()->nullable()->index();
                $table->integer('plan_id')->unsigned()->nullable()->index();
                $table->string('type', 50);
                $table->string('transaction_id', 50)->nullable();
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
        Schema::drop('payments');
    }

}
