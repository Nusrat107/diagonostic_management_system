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
        Schema::create('doctor__education', function (Blueprint $table) {
            $table->id();
            $table->foreignId('doctor_id');
            $table->string('institution')->nullable();
            $table->string('subject')->nullable();
            $table->string('degree')->nullable();
            $table->string('grade')->nullable();
            $table->date('starting_date')->nullable();
            $table->date('complete_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctor__education');
    }
};
