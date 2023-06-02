<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
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
            $table->increments('user_id');
            $table->string('name')->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('mobile')->unique()->nullable();
            $table->string('password')->nullable();
            $table->text('address')->nullable();
            $table->integer('created_by')->unsigned()->references('user_id')->on('users')->nullable(); 
            $table->integer('updated_by')->nullable();
            $table->timestamp('verified_at')->nullable();
            $table->integer('is_admin')->default(0)->comment('1:yes,0:no');
            $table->integer('status')->default(1)->comment('1:Active,0:Inactive');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
