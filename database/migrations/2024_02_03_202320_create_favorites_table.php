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
        Schema::create('favorites', function (Blueprint $table) {
            $table->id();
            $table->foreignId('admin_id')
                   ->nullable()
                   ->constrained('admins')
                   ->cascadeOnDelete();
            $table->foreignId('user_id')
                   ->nullable()
                   ->constrained('users')
                   ->cascadeOnDelete();

            $table->foreignId('place_id')
                   ->nullable()
                   ->constrained('places')
                   ->cascadeOnDelete();

            $table->foreignId('comment_id')
                   ->nullable()
                   ->constrained('comments')
                   ->cascadeOnDelete();    
            $table->enum('status',['admin','user']);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('favorites');
    }
};
