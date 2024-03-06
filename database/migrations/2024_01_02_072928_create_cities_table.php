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
        Schema::create('cities', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->char('country_code',4);
            $table->text('about')->nullable();
            $table->text('google_map')->nullable();
            $table->text('reach_by_plane')->nullable();
            $table->text('reach_by_train')->nullable();
            $table->text('reach_by_car')->nullable();
            $table->text('reach_by_public_transport')->nullable();
            $table->integer('search_count')->default(0);
            $table->enum('status',['active','archived'])->default('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cities');
    }
};
