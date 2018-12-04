<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccountsUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accounts_users', function (Blueprint $table) {
            $table->integer('user_id')->unsigned();
            $table->integer('account_id')->unsigned();
            $table->primary(['user_id','account_id']);
            $table->timestamps();
            
            //Relations
            $table->foreign('user_id')->references('id')->on('secUsers')->onDelete('cascade');
            $table->foreign('account_id')->references('id')->on('admAccounts')->onDelete('cascade');
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('accounts_users');
    }
}
