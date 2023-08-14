<?php

use App\Models\AttributeOption;
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
        Schema::create('attribute_option_sku', function (Blueprint $table) {
//            $table->id();
            $table->primary(['attribute_option_id','sku_id']);

            $table->integer('number');

            $table->foreignIdFor(Sku::class)
            ->constrained();

            $table->foreignIdFor(AttributeOption::class)
            ->constrained();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attribute_option_sku');
    }
};
