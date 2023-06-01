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
        Schema::create('plan_objectives', function (Blueprint $table) {
            $table->id();
            $table->string('scope_target',255)->nullable();
            $table->string('scope_tolerance',255)->nullable();
            $table->string('time_target',255)->nullable();
            $table->string('time_tolerance',255)->nullable();
            $table->string('cost_target',255)->nullable();
            $table->string('cost_tolerance',255)->nullable();
            $table->string('quality_target',255)->nullable();
            $table->string('quality_tolerance',255)->nullable();
            $table->string('risk_target',255)->nullable();
            $table->string('risk_tolerance',255)->nullable();
            $table->string('benefit_target',255)->nullable();
            $table->string('benefit_tolerance',255)->nullable();
            $table->unsignedBigInteger('plan_id')->nullable();
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
        Schema::dropIfExists('plan_objectives');
    }
};
