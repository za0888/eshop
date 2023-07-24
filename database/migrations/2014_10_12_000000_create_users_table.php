<?php

use App\enums\ManagerState;
use App\Models\Stock;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\enums\UserStatus;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');

            $table->string('phone');
            $table->string('region');
            $table->string('city');
            $table->string('post_code');
            $table->string('mail_operator_address')->nullable();
            $table->string('mail_operator')->nullable();

            $table->string('email')->unique();
            $table->string('status')->nullable();
            $table->string('manager_state')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
