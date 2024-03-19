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
        Schema::create('main_cross_images', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('description');
            $table->text('image');
            $table->text('url');
            $table->enum('status',[0,1])->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('main_cross_images');
    }
};
