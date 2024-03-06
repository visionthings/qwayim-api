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
        Schema::create('places', function (Blueprint $table) {
            $table->id();
            $table->foreignId('city_id')
                  ->constrained('cities')
                  ->cascadeOnDelete();
            $table->foreignId('category_id')
                  ->constrained('categories')
                  ->cascadeOnDelete();


            $table->string('name');
            $table->text('google_map')->nullable();
            $table->text('address')->nullable();
            $table->text('description');

            $table->string('nearest_airport')->nullable();
            $table->string('distance')->nullable();
            $table->integer('search_count')->default(0);

            $table->text('reach_by_plane')->nullable();
            $table->text('reach_by_train')->nullable();
            $table->text('reach_by_car')->nullable();
            $table->text('reach_by_public_transport')->nullable();

            $table->integer('view')->default(0);
            $table->enum('status',['active','archived'])->default('active');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('places');
    }
};
