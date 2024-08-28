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
        schema::create('bag', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->decimal('weight', 10, 2)->default(0);
            $table->decimal('value', 10, 2)->default(0);
            $table->foreignId('container_id')->nullable()->constrained('container')->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bag');
    }
};
