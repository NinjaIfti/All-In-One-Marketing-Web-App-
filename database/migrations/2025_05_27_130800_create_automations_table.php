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
        Schema::create('automations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('name');
            $table->text('description')->nullable();
            $table->enum('status', ['draft', 'active', 'paused', 'completed'])->default('draft');
            $table->enum('type', ['email', 'sms', 'mixed', 'custom'])->default('email');
            $table->text('triggers')->nullable(); // JSON array of trigger conditions
            $table->integer('total_contacts')->default(0);
            $table->integer('active_contacts')->default(0);
            $table->integer('completed_contacts')->default(0);
            $table->datetime('last_execution')->nullable();
            $table->datetime('next_scheduled_execution')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('automations');
    }
};
