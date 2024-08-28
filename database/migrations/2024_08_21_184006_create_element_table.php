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
        Schema::create('element', function (Blueprint $table) {
            $table->id();
            $table->string('materials_name');
            $table->decimal('amount', 10, 2);
            $table->string('unit');
            $table->string('material_type');
            $table->foreignId('bag_id')->constrained('bag')->onDelete('cascade');
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('element');
    }
};
