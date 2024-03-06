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
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('phone')->unique();
            $table->string('job_name');
            $table->string('job_descripation')->nullable();
            
            $table->enum('setting_change_not',[0,1])->default(0);
            $table->enum('subscriper_message_not',[0,1])->default(0);
            $table->enum('subscriper_comment_not',[0,1])->default(0);
            $table->enum('subscriper_rate_not',[0,1])->default(0);
            $table->enum('subscriper_question_not',[0,1])->default(0);
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admins');
    }
};
