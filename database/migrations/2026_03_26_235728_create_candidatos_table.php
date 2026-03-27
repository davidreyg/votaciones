<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('candidatos', function (Blueprint $table): void {
            $table->id();
            $table->foreignId('empleado_id')->unique()->constrained()->onDelete('cascade');
            $table->foreignId('partido_id')->constrained()->onDelete('cascade');
            $table->string('cargo');
            $table->integer('orden')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('candidatos');
    }
};
