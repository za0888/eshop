<?php

use App\Models\Discount;
use App\Models\Sku;
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
        Schema::create('discount_sku', function (Blueprint $table) {
//            $table->id();
            $table->primary(['sku_id','discount_id']);
            $table->integer('value');

            $table->foreignIdFor(Sku::class)
            ->constrained();

            $table->foreignIdFor((Discount::class))
            ->constrained();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('discount_sku');
    }
};
