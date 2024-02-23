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
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('id_card');
            $table->string('gender');
            $table->string('name');
            $table->string('surname');
            $table->timestamp('date_of_birth');
            $table->string('address');
            $table->string('post_code')->nullable();
            $table->string('contact_number_one');
            $table->string('contact_number_two')->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->index('id_card');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};
