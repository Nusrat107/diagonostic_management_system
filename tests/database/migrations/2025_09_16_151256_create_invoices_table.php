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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->string('barcode');
            $table->string('patient_code');
            $table->string('patient_name');
            $table->string('phone_number');
            $table->integer('subtotal');
            $table->integer('discount');
            $table->integer('total');
            $table->integer('paid_amount');
            $table->integer('due_amount')->nullable();
            $table->string('date');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
