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
        Schema::dropIfExists('sortie_produits');
        Schema::create('sortie_produits', function (Blueprint $table) {
            $table->increments("id_sortie_p");
            $table->integer("qte_sortie");
            $table->date("date_sortie");
            $table->unsignedInteger("id_produit");
            $table->unsignedInteger("id_service");
            $table->timestamps();

            $table->foreign('id_produit')->references('id_produit')->on('produits')->onDelete('cascade');
            $table->foreign('id_service')->references('id_service')->on('services')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sortie_produits');
    }
};
