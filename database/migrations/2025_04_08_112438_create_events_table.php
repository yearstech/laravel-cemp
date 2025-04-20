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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->unsignedBigInteger('event_type_id');
            $table->char('details', length: 200);
            $table->dateTime('start_datetime');
            $table->dateTime('end_datetime');
            $table->string('venue');
            $table->string('banner')->nullable();

            $table->unsignedBigInteger('host_user_id');
            $table->decimal('registration_fee', 8, 2);
            $table->boolean('is_public');
            $table->boolean('is_active');
            $table->timestamps();

            // Add foreign key constraints
            $table->foreign('event_type_id')->references('id')->on('event_types')->onDelete('cascade');
            $table->foreign('host_user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
