<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUserAgentsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'user_agents', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('user_id')->unsigned()->index();
                $table->string('package_name')->nullable()->default('');
                $table->string('version')->nullable()->default('');
                $table->enum('type', array('sign-in','sign-up'));
                $table->timestamps();
                $table->unique(['user_id','package_name']);
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
        Schema::drop('user_agents');
    }

}
