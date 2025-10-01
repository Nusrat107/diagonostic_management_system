<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->string('patient_name');
            $table->string('patient_id');
            $table->date('admission_date');
            $table->date('discharge_date')->nullable();
            $table->text('services'); 
            $table->text('amounts'); 
            $table->string('total_amount'); 
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
