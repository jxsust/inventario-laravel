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
        Schema::create('movements', function (Blueprint $table) {
            $table->id();

            $table->integer('type');

            $table->string('serie');
            $table->integer('correlative');

            $table->timestamp('date');

            $table->foreignId('warehouse_id')
                ->constrained()
                ->onDelete('cascade');
                
            $table->decimal('total', 10, 2)
                ->default(0);

            $table->string('observation')
                ->nullable();

            $table->foreignId('reason_id')
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
        Schema::dropIfExists('movements');
    }
};
