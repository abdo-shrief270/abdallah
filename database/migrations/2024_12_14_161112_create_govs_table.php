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
        Schema::create('govs', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('rout_id');
            $table->foreign('rout_id')->references('id')->on('routs')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('govs');
    }
};
