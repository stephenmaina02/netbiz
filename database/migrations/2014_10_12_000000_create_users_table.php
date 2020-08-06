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
            $table->id();
            $table->string('name');
            $table->string('username',50)->unique();
            $table->string('phone',12)->unique();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->enum('role',['a','u'])->default('u');//a stands for admin, u stands for user
            $table->enum('super_admin',['y','n'])->default('n');// y stands for yes , n stands for no
            $table->enum('active',['y','n'])->default('n');
            $table->string('invited_by',50)->nullable();
            $table->enum('banned',['y','n'])->default('n');
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
