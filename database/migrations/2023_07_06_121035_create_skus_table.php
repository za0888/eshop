<?php

use App\Models\Product;
use App\Models\Stock;
use App\Models\Unit;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('skus', function (Blueprint $table) {
            $table->id();

            $table->string('skucode');
            $table->string('barcode');
            $table->float('price');

            $table->foreignIdFor(Product::class)
                ->constrained();

            $table->foreignIdFor(Stock::class)
                ->constrained();

            $table->foreignIdFor(Unit::class)
                ->constrained();

            $table->integer('number_in_stock')->default(0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('skus');
    }
};
