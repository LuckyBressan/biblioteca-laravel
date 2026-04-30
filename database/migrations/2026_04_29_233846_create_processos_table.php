<?php

use App\Enums\ProcessoStatus;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('processos', function (Blueprint $table) {
            $table->id();
            $table->string('observacao')->nullable(true);
            $table
                ->enum('status', [ProcessoStatus::ABERTO, ProcessoStatus::FECHADO])
                ->nullable(false)
                ->default(ProcessoStatus::ABERTO);
            $table->foreignId('cliente_id')->constrained('cliente');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('processos');
    }
};
