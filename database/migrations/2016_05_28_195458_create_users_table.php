<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('role_id')->unsigned();
            $table->string('username')->unique();
            $table->string('ref_id');
            $table->string('email')->unique();
            $table->integer('is_address_verified')->nullable();
            $table->integer('is_id_verified')->nullable();
            $table->string('password');
            $table->string('avatar')->nullable();
            $table->string('is_email_verified')->default(EMAIL_VERIFICATION_STATUS_INACTIVE);
            $table->string('is_financial_active')->default(FINANCIAL_STATUS_ACTIVE);
            $table->string('is_accessible_under_maintenance')->default(UNDER_MAINTENANCE_ACCESS_INACTIVE);
            $table->integer('is_active')->default(USER_STATUS_ACTIVE);
            $table->rememberToken();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->timestamps();

            $table->foreign('role_id')
                ->references('id')
                ->on('roles')
                ->onDelete('restrict')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
