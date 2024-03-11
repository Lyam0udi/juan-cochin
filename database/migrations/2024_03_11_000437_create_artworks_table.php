<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('artworks', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->string('image_path');
            $table->decimal('price', 8, 2);
            $table->timestamps(); // This line is enough, it will automatically create 'created_at' and 'updated_at'
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('artworks');
    }
};
