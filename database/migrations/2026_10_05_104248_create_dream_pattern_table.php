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
        Schema::create('dream_pattern', function (Blueprint $table) {

            $table->foreignId('dream_id')->constrained()->cascadeOnDelete(); //makes sure that element exists; cascade on delete will make sure that on delete the row in the pivot table will also be deleted
            $table->foreignId('pattern_id')->constrained()->cascadeOnDelete();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dream_pattern');
    }
};
