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
        Schema::create('walas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('khidmat_id')->constrained()->cascadeOnDelete();
            $table->foreignId('ahbab_id')->constrained()->cascadeOnDelete();
            $table->foreignId('markaz_id')->constrained()->cascadeOnDelete();
            $table->date('date');
            $table->time('time');
            $table->string('location');
            $table->string('description')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('walas');
    }
};
