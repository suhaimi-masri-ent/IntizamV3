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
        Schema::create('takazas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('tafakut_id')->constrained()->cascadeOnDelete(); //Passed onlly
            $table->foreignId('mohallah_id')->constrained()->cascadeOnDelete(); //Route to Mohallah
            $table->foreignId('amal_id')->constrained()->cascadeOnDelete(); //Takaza
            $table->char('no_jemaah')->nullable();
            $table->date('tarikh_hidayat')->nullable();
            $table->date('tarikh_kharguzari')->nullable();
            $table->date('tarikh_tangguh')->nullable();
            $table->string('comment')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('takazas');
    }
};
