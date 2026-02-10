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
            $table->string('code')->unique();
            $table->nullableMorphs('customerable'); // agent / customer
            $table->integer('pax');
            $table->decimal('total_price', 15, 2);
            $table->string('currency', 5);
            $table->date('valid_until');
            $table->string('status')->default('draft'); // draft, sent, approved, expired

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
