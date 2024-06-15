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
        Schema::create('tblcategory_post', function (Blueprint $table) {
            $table->id(); // id: int(10) unsigned, NO, PRI, NULL, auto_increment
            $table->unsignedBigInteger('post_id'); // post_id: int(10) unsigned, NO, NULL
            $table->unsignedBigInteger('category_id'); // category_id: int(10) unsigned, NO, NULL
            $table->timestamps(); // created_at: timestamp, YES, NULL, updated_at: timestamp, YES, NULL

            // Menambahkan foreign key
            $table->foreign('post_id')->references('id')->on('tblposts')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('tblcategories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('category_post');
    }
};
