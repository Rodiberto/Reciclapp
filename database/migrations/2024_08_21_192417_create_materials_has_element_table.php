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
        Schema::create('materials_has_element', function (Blueprint $table) {
            $table->foreignId('materials_id')->constrained('materials')->onDelete('cascade');
            $table->foreignId('element_id')->constrained('element')->onDelete('cascade');
            $table->timestamps();

            $table->primary(['materials_id', 'element_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('materials_has_element');
    }
};
