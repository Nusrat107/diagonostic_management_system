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
        Schema::create('salary_settings', function (Blueprint $table) {
            $table->id();
             $table->decimal('da', 5, 2)->default(0); 
            $table->decimal('hra', 5, 2)->default(0); 
            $table->decimal('pf_employee', 5, 2)->default(0); 
            $table->decimal('pf_organization', 5, 2)->default(0); 
            $table->decimal('esi_employee', 5, 2)->default(0); 
            $table->decimal('esi_organization', 5, 2)->default(0); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('salary_settings');
    }
};
