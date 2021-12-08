<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeDepartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'employee_departments',
            function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->unsignedBigInteger('employee_id');
                $table->unsignedBigInteger('department_id');
                $table->tinyInteger('is_head')->default(0);
                $table->timestamps();

                $table->foreign('employee_id')
                    ->references('id')->on('employees')
                    ->onDelete('cascade');
                $table->foreign('department_id')
                    ->references('id')->on('departments')
                    ->onDelete('cascade');
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
        Schema::dropIfExists('employee_departments');
    }
}
