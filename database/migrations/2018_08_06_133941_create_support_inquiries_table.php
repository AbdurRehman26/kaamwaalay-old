<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSupportInquiriesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'support_inquiries', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('support_question_id')->unsigned()->index();
                $table->text('message', 65535);
                $table->integer('user_id')->unsigned()->nullable()->index();
                $table->string('name', 50)->nullable();
                $table->string('email', 100)->nullable();
                $table->boolean('is_replied')->nullable()->default(0);
                $table->timestamps();
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
        Schema::drop('support_inquiries');
    }

}
