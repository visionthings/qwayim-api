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
        Schema::create('rates', function (Blueprint $table) {
            $table->id();
            $table->foreignId('place_id')
                   ->constrained('places')
                   ->cascadeOnDelete();

            $table->foreignId('user_id')
                   ->constrained('users')
                   ->cascadeOnDelete();
            $table->enum('rate',[0,1,2,3,4,5])->default(0);        
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rates');
    }
};