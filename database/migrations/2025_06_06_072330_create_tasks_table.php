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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('status')->default('pending'); // pending, in_progress, completed, etc.
            $table->date('due_date')->nullable();
            $table->foreignId('project_id')->constrained()->onDelete('cascade'); // Assuming a task belongs to a project
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Assuming a task is assigned to a user
            $table->integer('priority')->default(1); // 1: low, 2: medium, 3: high
            $table->boolean('is_completed')->default(false); // To track if the task is completed
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
