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
        Schema::create('leitner_reports', function (Blueprint $table) {
            $table->id();
            $table->foreignId('leitner_item_id')
                ->constrained('leitner_items')
                ->cascadeOnUpdate()
                ->restrictOnDelete();
            $table->date('date');
            $table->boolean('was_correct');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leitner_reports');
    }
};
