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
        Schema::create('plans', function (Blueprint $table) {
            $table->id();
            $table->string('project_name',255)->nullable();
            $table->string('document_date',255)->nullable();
            $table->string('author',255)->nullable();
            $table->string('approver',255)->nullable();
            $table->string('document_code',255)->nullable();
            $table->string('version',255)->nullable();
            $table->string('approval_date',255)->nullable();
            $table->string('name',255)->nullable();
            $table->text('signature',6000)->nullable();
            $table->string('notes',1048)->nullable();
            $table->unsignedBigInteger('objective_id')->nullable();
            $table->unsignedBigInteger('product_id')->nullable();
            $table->unsignedBigInteger('monitor_and_prerequisities_id')->nullable();
            $table->unsignedBigInteger('schedule_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->timestamps();
            $table->softDeletesTz('deleted_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plans');
    }
};
