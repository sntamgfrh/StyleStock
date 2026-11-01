<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasTable('sale_items')) {
            Schema::create('sale_items', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('sale_id');
                $table->integer('product_id');
                $table->unsignedInteger('quantity');
                $table->decimal('unit_price', 12, 2);
                $table->decimal('subtotal', 12, 2);
                $table->timestamps();

                $table->foreign('sale_id')
                    ->references('id')
                    ->on('sales')
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
        // Tabel tidak dihapus agar data transaksi tetap aman.
    }
};