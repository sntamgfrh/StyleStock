<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasTable('purchase_items')) {
            Schema::create('purchase_items', function (Blueprint $table) {
                $table->id();

                $table->unsignedBigInteger('purchase_id');
                $table->integer('product_id');

                $table->unsignedInteger('quantity');
                $table->decimal('unit_cost', 12, 2);
                $table->decimal('subtotal', 12, 2);

                $table->timestamps();

                $table->foreign('purchase_id')
                    ->references('id')
                    ->on('purchases')
                    ->cascadeOnDelete();

                $table->foreign('product_id')
                    ->references('id')
                    ->on('products')
                    ->restrictOnDelete();
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('purchase_items');
    }
};
