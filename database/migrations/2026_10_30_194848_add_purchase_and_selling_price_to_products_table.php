<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->decimal('purchase_price', 12, 2)
                ->default(0)
                ->after('price');

            $table->decimal('selling_price', 12, 2)
                ->default(0)
                ->after('purchase_price');
        });

        // Salin harga lama ke harga jual agar data tidak hilang.
        DB::table('products')->update([
            'selling_price' => DB::raw('price'),
        ]);
    }

    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn([
                'purchase_price',
                'selling_price',
            ]);
        });
    }
};
