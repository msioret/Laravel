<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdmAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admAccounts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('description');
            $table->string('cpfCnpj')->nullable();
            $table->string('zipCode')->nullable();
            $table->string('idState')->nullable();
            $table->string('idCity')->nullable();
            $table->string('address')->nullable();
            $table->string('email');
            $table->string('idPlan');
            $table->string('created')->nullable();
            $table->string('modified')->nullable();
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
        Schema::dropIfExists('admAccounts');
    }
}
