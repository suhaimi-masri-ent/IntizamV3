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
        Schema::create('tafakuts', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('azam.ahbab_id')->constrained()->cascadeOnDelete();
            // $table->foreignId('amalan_id')->constrained()->cascadeOnDelete();
            $table->boolean('status')->default(false);
            $table->boolean('flag')->default(false);
            $table->string('syor1')->nullable();
            $table->foreignId('pencadang1_id')->nullable()->constrained('ahbabs')->cascadeOnDelete();
            $table->date('tarikh_syor1')->nullable();
            $table->string('syor2')->nullable(); 
            $table->foreignId('pencadang2_id')->nullable()->constrained('ahbabs')->cascadeOnDelete();
            $table->date('tarikh_syor2')->nullable();
            $table->string('comment')->nullable(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tafakuts');
    }
};
