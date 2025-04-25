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
        Schema::create('recent_works', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('package_name');
            $table->string('image');
            $table->text('social_media_name');
            $table->boolean('status')->default(1);
            $table->text('images');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recent_works');
    }
};
