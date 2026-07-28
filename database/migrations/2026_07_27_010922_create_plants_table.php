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
        Schema::create('cultivars', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name');
            $table->foreignId('species_id')
                ->constrained('species')
                ->restrictOnDelete();
        });

        Schema::create('plants', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name')->nullable();
            $table->string('description', 500)->nullable();
            $table->string('location', 100)->nullable();
            $table->string('source', 100)->nullable();
            $table->dateTime('orlah_date')->nullable();
            $table->dateTime('planted_date')->nullable();
            $table->foreignId('species_id')
                ->constrained('species')
                ->restrictOnDelete();
        });

        Schema::create('plant_images', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('image_path');
            $table->foreignId('plant_id')
                ->constrained('plants')
                ->onDelete('cascade');
        });

        Schema::create('cultivar_plant', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('plant_id')->constrained('plants')->onDelete('cascade');
            $table->foreignId('cultivar_id')->constrained('cultivars')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cultivar_plant');
        Schema::dropIfExists('plant_images');
        Schema::dropIfExists('plants');
        Schema::dropIfExists('cultivars');
    }
};
