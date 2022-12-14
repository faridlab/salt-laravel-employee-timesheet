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
        Schema::create('timesheet_approvals', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('employee_id')->references('id')->on('employees');
            $table->foreignUuid('approver_id')->nullable()->references('id')->on('employees');

            $table->year('year');
            $table->tinyInteger('month');
            $table->text('remark');
            $table->time('billable_time')->comment('in a month, user work 176.5 hours in total, 176:30:00');
            $table->double('billable_cost', 12, 2);

            $table->enum('status', ['approved', 'pending', 'active'])->default('pending');
            $table->json('data')->nullable();

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
        Schema::dropIfExists('timesheet_approvals');
    }
};
