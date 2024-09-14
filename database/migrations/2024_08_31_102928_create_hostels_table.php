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
        Schema::create('hostels', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50); // Name of the hostel
            $table->string('location', 50); // Location/address of the hostel
            $table->integer('total_rooms'); // Total number of rooms in the hostel
            $table->string('warden_name', 50); // Name of the hostel warden
            $table->string('contact_number', 50); // Contact number of the warden or hostel office
            $table->timestamps();
        });
    }

    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hostels');
    }
};
