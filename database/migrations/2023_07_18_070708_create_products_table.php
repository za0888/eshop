<?php

use App\Models\Order;
use App\Models\Stock;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name');
            $table->json('properties')->nullable();
            $table->integer('number_in_stock')->default(0);
            $table->foreignIdFor(Stock::class);
//            from the very beginnig product is not related to order
            $table->foreignIdFor(Order::class)->nullable();
            $table->softDeletes();

//            products is stocked or in the stockk  or with the user/manager
            /*$table->integer('stockable_id');
            $table->string('stockable_type');*/
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
