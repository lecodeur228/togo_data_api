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
        Schema::create('places', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('imageUrl');
            $table->string('categorie');
            $table->float('latitude', 10, 6);
            $table->float('longitude', 10, 6);
            $table->string('phone')->nullable();
            $table->decimal('etoile', 2, 1)->default(1);
            $table->Text('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('places');
    }
};
