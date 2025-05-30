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
        Schema::create('page_lists', function (Blueprint $table) {
            $table->id();
            $table->foreignId('page_id')->constrained('pages')->cascadeOnDelete();
            $table->string('title_kk');
            $table->string('title_ru');
            $table->string('title_en')->nullable();
            $table->text('content_kk');
            $table->text('content_ru');
            $table->text('content_en')->nullable();
            $table->string('slug',255);
            $table->string('image')->nullable();
            $table->datetime('date')->nullable();
            $table->boolean('active');
            $table->json('gallery')->nullable();   
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('page_lists');
    }
};
