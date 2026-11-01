<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasTable('purchases')) {
            Schema::create('purchases', function (Blueprint $table) {
                $table->id();

                $table->integer('supplier_id');
                $table->integer('user_id');

                $table->string('purchase_number')->unique();
                $table->decimal('total', 12, 2)->default(0);
                $table->string('status')->default('completed');
                $table->dateTime('purchased_at');

                $table->timestamps();

                $table->foreign('supplier_id')
                    ->references('id')
                    ->on('suppliers')
                    ->restrictOnDelete();

                $table->foreign('user_id')
                    ->references('id')
                    ->on('users')
                    ->restrictOnDelete();
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('purchases');
    }
};
