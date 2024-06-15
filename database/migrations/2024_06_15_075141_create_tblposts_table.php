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
        Schema::create('tblposts', function (Blueprint $table) {
            $table->id();
            $table->string('title', 191)->nullable(false);
            $table->string('seotitle', 191)->nullable();
            $table->string('user_id', 191)->nullable();
            $table->text('content')->nullable(false);
            $table->string('image', 191)->default('noimage.jpg')->nullable();
            $table->integer('hits')->default(0)->nullable(false);
            $table->enum('active', ['Yes', 'No'])->default('Yes')->nullable(false);
            $table->enum('status', ['publish', 'draft'])->default('publish')->nullable(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
