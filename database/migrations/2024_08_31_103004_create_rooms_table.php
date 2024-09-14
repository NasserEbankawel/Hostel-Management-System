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
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->string('room_number', 50); // Unique identifier for the room            
            $table->string('type', 50); // Type of room (e.g., single, double, dormitory)
            $table->string('status', 50); // Status of the room (e.g., occupied, available)
            $table->integer('capacity'); // Capacity of the room
            $table->decimal('price_per_month', 8, 2); // Rent price per month
            $table->timestamps();

            $table->unsignedBigInteger('hostel_id'); // Foreign key to the hostels table
            $table->foreign('hostel_id')->references('id')->on('hostels')->restrictOnDelete();



        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};
