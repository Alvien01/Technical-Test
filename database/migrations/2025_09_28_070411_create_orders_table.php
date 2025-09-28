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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');   // user pemesan
            $table->foreignId('tukang_id')->constrained('tukangs')->onDelete('cascade'); // tukang dipesan
            $table->date('start_date');
            $table->integer('duration_days');
            $table->enum('status', [
                'pending',
                'accepted',
                'rejected',
                'on-the-way',
                'arrived',
                'completed'
            ])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
