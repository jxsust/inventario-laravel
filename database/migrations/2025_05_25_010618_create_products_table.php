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
        Schema::create('products', function (Blueprint $table) {
            $table->id();

            $table->string('name')->unique();
            
            $table->text('description')
                ->nullable();

            $table->string('sku')
                ->unique()
                ->nullable();

            $table->string('barcode')
                ->unique()
                ->nullable();

            $table->decimal('price', 10, 2)
                ->default(0.00);

            $table->foreignId('category_id')
                ->constrained()
                ->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
