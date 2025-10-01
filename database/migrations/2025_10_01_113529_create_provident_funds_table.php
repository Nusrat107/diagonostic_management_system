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
        Schema::create('provident_funds', function (Blueprint $table) {
            $table->id();
            $table->string('employee_id')->nullable();
            $table->string('fund_type'); 
            $table->string('employee_share_amount')->nullable();
            $table->string('organization_share_amount')->nullable();
            $table->string('employee_share_percentage')->nullable();
            $table->string('organization_share_percentage')->nullable();
            $table->string('description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('provident_funds');
    }
};
