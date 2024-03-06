<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->char('country_code',4)->nullable();
            $table->string('city')->nullable();
            $table->enum('gender',['male','female'])->nullable();
            $table->date('date_of_birth')->nullable();
            $table->enum('online',[0,1])->default(1);
            // $table->enum('subscribe_status',['normal','subscribe','cancel_subscribe','block'])->default('normal');
            $table->enum('status',['active','archived','block'])->default('active');
            // $table->timestamp('email_verified_at')->nullable();
            // $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
