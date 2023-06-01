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
        Schema::create('plan_monitor_and_prerequisities', function (Blueprint $table) {
            $table->id();
            $table->string('monitoring',1000)->nullable();
            $table->string('control',1000)->nullable();
            $table->string('pre_requisities',1000)->nullable();
            $table->string('assumptions',1000)->nullable();
            $table->string('external_dependencies',1000)->nullable();
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
        Schema::dropIfExists('plan_monitor_and_prerequisities');
    }
};
