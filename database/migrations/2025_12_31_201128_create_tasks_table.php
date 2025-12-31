<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();

            // Título da tarefa
            $table->string('title');

            // Descrição (opcional)
            $table->text('description')->nullable();

            // Prioridade: low | medium | high
            $table->enum('priority', ['low', 'medium', 'high'])
                  ->default('medium');

            // Data de vencimento (opcional)
            $table->date('due_date')->nullable();

            // Estado da tarefa
            $table->boolean('is_completed')->default(false);

            // Datas automáticas (created_at, updated_at)
            $table->timestamps();

            // Índices para melhor performance
            $table->index('is_completed');
            $table->index('priority');
            $table->index('due_date');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
