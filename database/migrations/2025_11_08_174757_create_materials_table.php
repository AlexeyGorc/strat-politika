<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('materials', function (Blueprint $table) {
            $table->id();
            $table->foreignId('author_id')->constrained('users')->cascadeOnDelete();
            $table->string('title');
            $table->string('slug')->unique();
            $table->enum('type', ['analytics', 'forecast']); // Аналитика | Прогнозы и риски
            $table->string('tags')->nullable();              // через запятую
            $table->text('excerpt')->nullable();
            $table->longText('content');
            $table->boolean('is_trending')->default(false);  // опционально для “важных/трендовых”
            $table->timestamps();

            $table->index(['type', 'is_trending']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('materials');
    }
};
