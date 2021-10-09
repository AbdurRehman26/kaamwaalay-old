<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePlansTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'plans', function (Blueprint $table) {
                $table->increments('id');

                $table->enum('product', array('featured_profile','urgent_job','account_creation'));

                $table->decimal('amount', 10, 2)->nullable();
                $table->integer('quantity')->nullable();
                $table->enum('type', array('service','job'));
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
        Schema::drop('plans');
    }

}
