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
        Schema::create('menu', function (Blueprint $table) {
            $table->uuid('id');
            $table->string('title')->nullable();
            $table->string('url')->nullable();
            $table->string('icon')->nullable();
            $table->integer('position')->nullable();
            $table->boolean('is_divider')->default(false);
            $table->uuid('parent_id')->nullable();
            $table->timestamps();

            $table->primary('id');
            $table->foreign('parent_id')->references('id')->on('menu');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menu');
    }
};
