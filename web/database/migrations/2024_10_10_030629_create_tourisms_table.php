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
        Schema::create('tourisms', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name', 50);
            $table->string('category', 15);
            $table->json('photos');
            $table->string('description', 500);
            $table->string('link', 50);
            $table->string('address', 100);
            $table->double('longitude');
            $table->double('latitude') ;
            $table->integer('price_min');
            $table->integer('price_max');
            $table->json('facilities');
            $table->float('rate');
            $table->boolean('is_recomended');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tourisms');
    }
};
