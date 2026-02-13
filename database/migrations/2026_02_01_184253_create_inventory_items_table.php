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
        Schema::create('inventory_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('inventory_category_id')
                ->constrained('inventory_categories')
                ->cascadeOnUpdate()
                ->restrictOnDelete();
            $table->foreignId('inventory_sub_category_id')
                ->nullable()
                ->constrained('inventory_sub_categories')
                ->cascadeOnUpdate()
                ->restrictOnDelete();
            $table->string('title', 50);
            $table->tinyInteger('priority', unsigned: true)->default(0);
            $table->string('image', 20)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventory_items');
    }
};
