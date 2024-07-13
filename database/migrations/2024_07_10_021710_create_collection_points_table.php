<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCollectionPointsTable extends Migration
{
    public function up()
    {
        Schema::create('collection_points', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('address')->nullable();
            $table->text('schedule')->nullable();
            $table->timestamps();
        });
    
        Schema::create('collection_point_material', function (Blueprint $table) {
            $table->id();
            $table->foreignId('collection_point_id')->constrained()->onDelete('cascade');
            $table->foreignId('material_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }
    
}

