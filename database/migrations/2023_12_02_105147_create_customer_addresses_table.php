<?php

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
        Schema::create('customer_addresses', function (Blueprint $table) {
            $table->id();
            $table->string('type', 50)->nullable();
            $table->string('address1', 200)->nullable();
            $table->string('address2', 200)->nullable();
            $table->string('city', 200)->nullable();
            $table->string('state', 200)->nullable();
            $table->string('zipcode', 200)->nullable();
            $table->string('country_code', 3);
            $table->foreignId('customer_id')->references('id')->on('customers');
            $table->foreign('country_code')->references('code')->on('countries');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer_addresses');
    }
};
