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
        Schema::create('plan_schedules', function (Blueprint $table) {
            $table->id();
            $table->string('activity',1000)->nullable();
            $table->string('task_name',1000)->nullable();
            $table->string('task_dependency',1000)->nullable();
            $table->string('dependency_relation',1000)->nullable();
            $table->string('description',1000)->nullable();
            $table->string('scope',1000)->nullable();
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
        Schema::dropIfExists('plan_plan_schedules');
    }
};
