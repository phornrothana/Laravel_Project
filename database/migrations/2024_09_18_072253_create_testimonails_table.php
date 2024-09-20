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
        Schema::create('testimonails', function (Blueprint $table) {
            $table->id();
            $table->integer('rate');
            $table->string('name')->nullable();
            $table->string('image')->nullable();
            $table->string('position')->nullable();
            $table->text('des')->nullable();
            $table->tinyInteger('status')->default(1);
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
        Schema::dropIfExists('testimonails');
    }
};
