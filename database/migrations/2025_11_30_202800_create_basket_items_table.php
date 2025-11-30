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
        Schema::create('basket_items', function (Blueprint $table) {

            $table->id();
            $table->integer("user_id")->unsigned();
            $table->integer("watch_id")->unsigned();
            $table->integer("size");
            $table->integer("quantity");
            $table->timestamps();

            $table
                ->foreign("user_id")
                ->references("id")
                ->on("users")
                ->cascadeOnDelete()
                ->cascadeOnUpdate();

            $table
                ->foreign("watch_id")
                ->references("id")
                ->on("watches")
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('basket_items');
    }
};
