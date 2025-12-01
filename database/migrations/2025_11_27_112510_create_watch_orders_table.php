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
            $table->integer("user_id")->unsigned();
            $table->integer("watch_id")->unsigned();
            $table->integer("shipping_address_id")->unsigned();
            $table->integer("card_id")->unsigned();
            $table->integer("size");
            $table->integer("quantity");

            $table->enum("status", ["pending", "shipping", "delivered"])->default("pending");

            $table
                ->foreign("user_id")
                ->references("id")
                ->on("users")
                ->cascadeOnUpdate()
                ->cascadeOnDelete();

            $table
                ->foreign("watch_id")
                ->references("id")
                ->on("watches")
                ->cascadeOnUpdate()
                ->noActionOnDelete();

            $table
                ->foreign("shipping_address_id")
                ->references("id")
                ->on("addresses")
                ->cascadeOnUpdate()
                ->noActionOnDelete();

            $table
                ->foreign("card_id")
                ->references("id")
                ->on("cards")
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
