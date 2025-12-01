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
        Schema::create('watch_orders', function (Blueprint $table) {
            $table->id();
            $table->integer("order_id")->unsigned();
            $table->integer("watch_id")->unsigned();
            $table->integer("size");
            $table->integer("quantity");

            $table
                ->foreign("order_id")
                ->references("id")
                ->on("orders")
                ->cascadeOnUpdate()
                ->cascadeOnDelete();

            $table
                ->foreign("watch_id")
                ->references("id")
                ->on("watches")
                ->cascadeOnUpdate()
                ->noActionOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('watch_orders');
    }
};
