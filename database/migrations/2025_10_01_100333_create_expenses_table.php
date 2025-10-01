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
        Schema::create('expenses', function (Blueprint $table) {
            $table->id();
             $table->string('item_name');
        $table->string('purchase_from')->nullable();
        $table->string('purchase_date')->nullable();
        $table->string('purchased_by')->nullable();
        $table->string('amount');
        $table->string('paid_by')->nullable(); 
        $table->string('status')->default('Pending');
        $table->string('image')->nullable(); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('expenses');
    }
};
