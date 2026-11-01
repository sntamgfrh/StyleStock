<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasTable('sales')) {
            Schema::create('sales', function (Blueprint $table) {
                $table->id();
                $table->integer('user_id');
                $table->string('sale_number')->unique();
                $table->decimal('total', 12, 2)->default(0);
                $table->string('status')->default('completed');
                $table->dateTime('sold_at');
                $table->timestamps();
            });
        }
    }

    public function down(): void
    {
        // Tabel tidak dihapus agar data transaksi tetap aman.
    }
};