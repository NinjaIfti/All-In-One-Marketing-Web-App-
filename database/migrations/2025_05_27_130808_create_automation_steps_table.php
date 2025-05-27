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
        Schema::create('automation_steps', function (Blueprint $table) {
            $table->id();
            $table->foreignId('automation_id')->constrained()->cascadeOnDelete();
            $table->string('name');
            $table->enum('type', [
                'delay', 
                'condition', 
                'send_email', 
                'send_sms', 
                'update_contact', 
                'webhook', 
                'notification',
                'custom_action'
            ]);
            $table->integer('position')->default(0);
            $table->text('config')->nullable(); // JSON configuration for the step
            $table->text('conditions')->nullable(); // JSON conditions
            $table->boolean('is_active')->default(true);
            $table->integer('succeeded_count')->default(0);
            $table->integer('failed_count')->default(0);
            $table->integer('skipped_count')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('automation_steps');
    }
};
