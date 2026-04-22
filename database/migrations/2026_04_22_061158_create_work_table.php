<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('works', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('category'); // mobile, web, social
            $table->string('cover_image');        // card e dekhabe
            $table->string('popup_image')->nullable(); // popup e dekhabe (optional)
            $table->date('work_date')->nullable();
            $table->boolean('is_extra')->default(false); // "Show More" section
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('works');
    }
};