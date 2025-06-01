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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();

            // Laravel'in önerdiği şekilde foreignId + constrained
            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            $table->string('name');
            $table->boolean('is_active')->default(1)->comment('0-inaktif, 1-aktif');

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
