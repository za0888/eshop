<?php

use App\enums\SkuStatus;
use App\Models\Package;
use App\Models\Product;
use App\Models\Stock;
use App\Models\Unit;
use App\Models\Vendor;
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
            $table->string('skuStatus')
                ->default(SkuStatus::ProductProcessing);
            $table->string('skucode');
            $table->string('barcode');
            $table->float('price');

//
            $table->integer('numberInStock');
            $table->string('locationInStock');


            $table->foreignIdFor(Product::class)
                ->constrained();

            $table->foreignIdFor(Stock::class)
                ->constrained();

            $table->foreignIdFor(Package::class)
                ->nullable();

            $table->foreignIdFor(Unit::class)
                ->nullable();

            $table->foreignIdFor(Vendor::class);


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
