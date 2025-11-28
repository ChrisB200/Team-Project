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
        Schema::create('watches', function (Blueprint $table) {
            $table->id();
            $table->integer("brand_id")->unsigned();
            $table->integer("supplier_id")->unsigned();
            $table->integer("category_id")->unsigned();

            // TODO: NEED TO FIND WATCH CATEGORIES $table->enum();

            $table->decimal("price");
            $table->text("name");
            $table->text("description");
            $table->integer("size");
            $table->timestamps();

            $table
                ->foreign("brand_id")
                ->references("id")
                ->on("brands")
                ->cascadeOnUpdate()
                ->restrictOnDelete();

            $table
                ->foreign("supplier_id")
                ->references("id")
                ->on("suppliers")
                ->cascadeOnUpdate()
                ->nullOnDelete();


            $table
                ->foreign("category_id")
                ->references("id")
                ->on("categories")
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('watches');
    }
};
