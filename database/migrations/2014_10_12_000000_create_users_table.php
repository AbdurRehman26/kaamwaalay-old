<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'users', function (Blueprint $table) {
                $table->increments('id');
                $table->string('first_name');
                $table->string('last_name');
                $table->string('email')->nullable()->unique();
                $table->string('address')->nullable();
                $table->string('profile_image')->nullable();
                $table->string('apartment')->nullable();
                $table->string('zip_code')->nullable();
                $table->string('phone_number', 50)->nullable();
                $table->string('password')->nullable();
                $table->integer('role_id')->unsigned()->index();
                $table->enum('access_level', array('full','reviewOnly'))->nullable();
                $table->integer('country_id')->unsigned()->nullable()->index();
                $table->integer('state_id')->unsigned()->nullable()->index();
                $table->integer('city_id')->unsigned()->nullable()->index();
                $table->string('activation_key')->nullable();
                $table->dateTime('activated_at')->nullable();
                $table->string('remember_token', 100)->nullable();
                $table->string('social_account_id')->nullable();
                $table->enum('status', array('pending','active','banned','deactived'))->nullable();
                $table->enum('social_account_type', array('facebook','google'))->nullable();
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
        Schema::drop('users');
    }

}
