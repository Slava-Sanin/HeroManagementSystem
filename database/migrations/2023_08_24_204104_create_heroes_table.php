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
        Schema::create('heroes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('ability', ['attacker', 'defender']);
            $table->unsignedBigInteger('trainer_id')->default(0);
            $table->date('started_training_date');
            $table->string('suit_colors');
            $table->decimal('starting_power', 8, 2);
            $table->decimal('current_power', 8, 2);
            $table->unsignedInteger('training_count')->default(0); // Количество тренировок в текущий день
            $table->date('last_training_date')->nullable(); // Дата последней тренировки
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('heroes');
    }
};
