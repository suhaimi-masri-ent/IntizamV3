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
        Schema::create('masjids', function (Blueprint $table) {
            $table->id();
            $table->foreignId('country_id')->constrained()->cascadeOnDelete();
            $table->foreignId('state_id')->constrained()->cascadeOnDelete();
            $table->foreignId('city_id')->constrained()->cascadeOnDelete();
            // $table->foreignId('mohallah_id')->constrained()->cascadeOnDelete();
            $table->foreignId('halqah_id')->constrained()->cascadeOnDelete();
            $table->foreignId('markaz_id')->constrained()->cascadeOnDelete();
            // $table->foreignId('zone_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
            $table->string('name');
            $table->char('type');
            $table->string('management');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('masjids');
    }
};
