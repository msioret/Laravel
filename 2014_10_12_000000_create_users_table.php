<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('secUsers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->tinyInteger('isValidEmail')->nullable();
            $table->string('emailValidationCode')->nullable(); //($value = true);
            $table->dateTime('emailVerifiedAt')->nullable();
            $table->string('cellphone');
            $table->tinyInteger('isValidCellphone')->nullable();
            $table->string('cellphoneValidationCode')->nullable();
            $table->dateTime('cellphoneVerifiedAt')->nullable();
            $table->string('photo')->nullable();
            $table->tinyInteger('superAdmin')->nullable();
            $table->string('password');
            $table->string('resetPasswordToken')->nullable();
            $table->string('resetPasswordTokenPublic')->nullable();
            $table->dateTime('resetPasswordExpires')->nullable();
            $table->tinyInteger('isActived')->nullable();
            $table->tinyInteger('isDeletedLogical')->nullable();
            $table->string('idCreate')->nullable();
            $table->string('created')->nullable();//->now();
            $table->string('idModified')->nullable();
            $table->string('modified')->nullable();
            $table->rememberToken();
            $table->timestamps();


        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('secUsers');
    }
}
