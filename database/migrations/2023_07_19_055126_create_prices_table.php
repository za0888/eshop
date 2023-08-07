<?php

use App\Models\Product;
use App\Models\Sku;
use App\Models\Unit;
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
        Schema::create('prices', function (Blueprint $table) {
            $table->id();
            $table->float('value');
            $table->date('start');
            $table->date('end')->nullable();
//            active, archiv
            $table->string('status');

            $table->foreignIdFor(Sku::class)
                ->constrained()
                ->cascadeOnDelete()
                ->cascadeOnUpdate();

            $table->foreignIdFor(Unit::class)
                ->constrained();

            $table->timestamps();
            $table->softDeletes();
// each price has bo be or active or achiv
            $table->unique(['id','status']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prices');
    }
};
