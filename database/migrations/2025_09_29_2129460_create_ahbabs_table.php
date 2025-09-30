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
        Schema::create('ahbabs', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('fullname');
            $table->string('nickname');
            $table->char('nric');
            $table->date('dob');
            $table->string('home_add');
            $table->char('phone')->nullable();
            $table->char('email')->nullable();
            $table->string('language')->nullable();
            $table->text('description')->nullable();
            $table->foreignId('occupation_id')->constrained()->cascadeOnDelete();
            $table->foreignId('marriage_id')->constrained()->cascadeOnDelete();
            $table->foreignId('country_id')->constrained()->cascadeOnDelete();
            $table->foreignId('state_id')->constrained()->cascadeOnDelete();
            $table->foreignId('city_id')->constrained()->cascadeOnDelete();
            $table->foreignId('markaz_id')->constrained()->cascadeOnDelete();
            $table->foreignId('halqah_id')->constrained()->cascadeOnDelete();
            $table->foreignId('mohallah_id')->constrained()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ahbabs');
    }
};
