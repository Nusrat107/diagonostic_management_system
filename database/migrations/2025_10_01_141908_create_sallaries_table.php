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
        Schema::create('sallaries', function (Blueprint $table) {
            $table->id();
            $table->string('staff_id')->unique();
            $table->string('net_salary');       
            $table->string('basic_salary')->nullable();
            $table->string('da')->nullable();
            $table->string('hra')->nullable();
            $table->string('conveyance')->nullable();
            $table->string('allowance')->nullable();
            $table->string('medical_allowance')->nullable();
            $table->string('other_earnings')->nullable();          
            $table->string('tds')->nullable();
            $table->string('esi')->nullable();
            $table->string('pf')->nullable();
            $table->string('leave_deduction')->nullable();
            $table->string('prof_tax')->nullable();
            $table->string('labour_welfare')->nullable();
            $table->string('fund')->nullable();
            $table->string('other_deductions')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sallaries');
    }
};
