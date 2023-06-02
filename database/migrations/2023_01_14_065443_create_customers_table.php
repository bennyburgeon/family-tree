<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->increments('customer_id');
            $table->string('firstname')->nullable();
            $table->string('lastname')->nullable();
            $table->string('image')->unique()->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('mobile')->unique()->nullable();
            $table->date('dob')->nullable();
            $table->integer('gender')->comment('1:male,2:female,3:others')->nullable();
            $table->string('username')->unique()->nullable();
            $table->string('password')->unique()->nullable();
            $table->text('address')->nullable();
            $table->integer('parent_id')->unsigned()->references('customer_id')->on('customers')->nullable();
            $table->integer('relationship')->unsigned()->references('customer_category_id')->on('customer_category')->nullable();
            $table->integer('created_by_admin')->unsigned()->references('user_id')->on('users')->nullable();
            $table->timestamp('verified_at')->nullable();
            $table->integer('status')->default(1)->comment('1:Active,0:Inactive');
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
        Schema::dropIfExists('customers');
    }
}
