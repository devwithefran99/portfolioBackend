<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('profile', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('tagline')->nullable();          // "Graphic Designer"
            $table->text('bio')->nullable();                // About Me paragraph
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('location')->nullable();         // "Chattogram, BD"
            $table->string('photo')->nullable();            // storage path
            $table->string('cv')->nullable();               // PDF path
            $table->string('behance')->nullable();
            $table->string('facebook')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('whatsapp')->nullable();
            $table->string('fiverr')->nullable();
            $table->string('telegram')->nullable();
            $table->boolean('open_to_work')->default(true);
            $table->timestamps();
        });

        // ── Skills table ───────────────────────────────────────
        Schema::create('skills', function (Blueprint $table) {
            $table->id();
            $table->string('name');                         // "Adobe Photoshop"
            $table->string('icon_path')->nullable();        // image path
            $table->tinyInteger('percentage')->default(80); // 0-100
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('skills');
        Schema::dropIfExists('profile');
    }
};