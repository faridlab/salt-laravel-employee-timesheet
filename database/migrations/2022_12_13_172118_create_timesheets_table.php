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
        Schema::create('timesheets', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('employee_id')->references('id')->on('employees');
            // $table->foreignUuid('project_id')->references('id')->on('projects');
            // $table->foreignUuid('task_id')->references('id')->on('tasks');

            $table->year('year');
            $table->tinyInteger('month');
            $table->date('date')->comment('date of timesheet');
            $table->string('remark')->nullable();
            $table->date('time')->comment('time that used to complete the timesheet, ex: 02:30:00, 2.5h for this timesheet');
            $table->date('time_start')->nullable();
            $table->date('time_end')->nullable();

            $table->enum('type', ['work', 'overtime'])->default('work');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('timesheets');
    }
};
