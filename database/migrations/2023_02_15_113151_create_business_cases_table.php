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
        Schema::create('business_cases', function (Blueprint $table) {
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
            $table->string('reasons',2000)->nullable();
            $table->string('duration',255)->nullable();
            $table->string('benefits_timescale',255)->nullable();
            $table->string('major_risks',255)->nullable();
            $table->string('cost',255)->nullable();
            $table->string('dis_benefits',255)->nullable();
            $table->string('benefits',255)->nullable();
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
        Schema::dropIfExists('business_cases');
    }
};
