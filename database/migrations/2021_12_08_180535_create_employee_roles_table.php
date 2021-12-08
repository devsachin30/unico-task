<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'employee_roles',
            function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->unsignedBigInteger('employee_id');
                $table->unsignedBigInteger('role_id');
                $table->timestamps();

                $table->foreign('employee_id')
                    ->references('id')->on('employees')
                    ->onDelete('cascade');
                $table->foreign('role_id')
                    ->references('id')->on('roles')
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
        Schema::dropIfExists('employee_roles');
    }
}
