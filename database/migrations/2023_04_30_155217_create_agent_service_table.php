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
        Schema::create('agent_service', function (Blueprint $table) {
            $table->id();
            $table-> unsignedInteger('id_agent')->nullable();
            $table->unsignedInteger('id_service')->nullable();
            $table->timestamps();

            $table->foreign('id_agent')->references('id_agent')->on('agents')->onDelete('cascade');
            $table->foreign('id_service')->references('id_service')->on('services')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agent_service');
    }
};
