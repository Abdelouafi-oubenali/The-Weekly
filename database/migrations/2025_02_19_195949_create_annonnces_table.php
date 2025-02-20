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
        Schema::create('annonnces', function (Blueprint $table) {
            $table->id();
            $table->string('titre');
            $table->text('description');
            $table->decimal('prix', 8, 2)->nullable();
            $table->string('image')->nullable();
            $table->foreignId('user_id')->constrained(); 
            $table->foreignId('categorie_id')->constrained(); 
            $table->enum('status', ['actif', 'brouillon', 'archive'])->default('brouillon');
            $table->softDeletes(); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('annonnces');
    }
};
