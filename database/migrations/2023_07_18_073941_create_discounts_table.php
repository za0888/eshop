<?php

use App\enums\DiscountState;
use App\Models\Product;
use App\Models\Sku;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('discounts', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('state')->default(DiscountState::Idle->value);
            $table->date('start')->nullable();
            $table->date('end')->nullable();
            $table->float('percent')->nullable();
            $table->foreignIdFor(Sku::class)
                ->constrained()
                ->cascadeOnDelete()
                ->cascadeOnUpdate();


            $table->timestamps();
            $table->softDeletes();

            $table->unique(['state','sku_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('discounts');
    }
};
