<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateServicesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'services', function (Blueprint $table) {
                $table->increments('id');
                $table->string('title', 50);
                $table->text('description', 65535)->nullable();
                $table->boolean('is_display_banner')->nullable()->default(0);
                $table->boolean('is_display_service_nav')->nullable()->default(0);
                $table->boolean('is_display_footer_nav')->nullable()->default(0);
                $table->boolean('is_featured')->nullable()->default(0);
                $table->string('url_prefix', 50)->nullable();
                $table->integer('parent_id')->nullable()->default(0);
                $table->json('images', 65535)->nullable();
                $table->boolean('status')->nullable()->default(1);
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
        Schema::drop('services');
    }

}
