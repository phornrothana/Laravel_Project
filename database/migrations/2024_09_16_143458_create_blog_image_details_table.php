<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog_image_details', function (Blueprint $table) {
            $table->id();
            $table->integer('blog_image_id');
            $table->string('title')->nullable();
            $table->json('multiple_image')->nullable();
            $table->text('des')->nullable();
            $table->softDeletes();
            $table->timestamps();
            $table->unsignedInteger('delete_by')->nullable();
            $table->unsignedInteger('update_by')->nullable();
            $table->unsignedInteger('created_by')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blog_image_details');
    }
};
