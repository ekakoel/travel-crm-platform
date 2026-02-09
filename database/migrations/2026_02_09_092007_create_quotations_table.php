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
        Schema::create('quotations', function (Blueprint $table) {
            $table->id();

            // siapa yang minta
            $table->nullableMorphs('quotable'); 
            // Admin (B2C) atau Agent (B2B)

            $table->string('code')->unique();
            $table->string('currency', 3)->default('USD');
            $table->integer('pax')->default(1);

            $table->decimal('subtotal', 15, 2)->default(0);
            $table->decimal('margin', 15, 2)->default(0);
            $table->decimal('total', 15, 2)->default(0);

            $table->date('valid_until')->nullable();

            $table->enum('status', [
                'draft',
                'sent',
                'approved',
                'expired',
                'rejected'
            ])->default('draft');

            $table->uuid('share_uuid')->unique();

            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quotations');
    }
};
