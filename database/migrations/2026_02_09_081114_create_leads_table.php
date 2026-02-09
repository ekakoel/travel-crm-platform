<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('leads', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->enum('source', ['website','whatsapp','instagram','agent']);
            $table->enum('status', ['new','contacted','quoted','won','lost'])->default('new');
            $table->foreignId('assigned_to')->nullable()->constrained('admins');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('leads');
    }
};
