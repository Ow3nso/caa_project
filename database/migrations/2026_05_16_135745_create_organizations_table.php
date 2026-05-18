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
        Schema::create('organizations', function (Blueprint $table) {
            $table->id();

            // 1. Organization Name
            $table->string('name');

            // 2. Type
            $table->string('type'); // e.g., 'AOC', 'AMO', 'ATO'

            // 3. Approval No.
            $table->string('approval_no')->unique();

            // 4. Valid Until
            $table->date('valid_until');

            // 5. Fleet Size
            $table->integer('fleet_size')->default(0);

            // 6. Status
            $table->string('status')->default('pending'); // 'valid' or 'pending' matching your layout buttons

            // Standard Laravel tracking timestamps
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('organizations');
    }
};