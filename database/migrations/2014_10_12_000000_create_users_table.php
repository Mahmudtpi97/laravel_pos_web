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
        Schema::create('users', function (Blueprint $table) {
            $table->id('id');
            $table->foreignId('group_id');
            $table->string('name',100);
            $table->string('email',100)->unique()->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('phone',100)->nullable();
            $table->text('address',100)->nullable();
            $table->date('birthday',100)->nullable();
            // $table->string('password',100);
            $table->string('photo',100)->nullable();
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
        Schema::dropIfExists('users');
    }
};
