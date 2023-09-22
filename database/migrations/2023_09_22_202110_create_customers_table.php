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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string("amountBeforeTax")->nullable();
            $table->string("billedEntityType")->nullable();
            $table->string("billedTo")->nullable();
            $table->string("expiryDate")->nullable();
            $table->string("number")->nullable();
            $table->string("nik")->nullable();
            $table->string("agentUid")->nullable();
            $table->string("storeName")->nullable();
            $table->string("email")->nullable();
            $table->string("npwp")->nullable();
            $table->string("agentName")->nullable();
            $table->string("grossAmount")->nullable();
            $table->integer("storeId")->nullable();
            $table->string("billedAddress")->nullable();
            $table->string("billedZipCode")->nullable();
            $table->string("billedProvince")->nullable();
            $table->string("createTime")->nullable();
            $table->string("phone")->nullable();
            $table->string("isHasExtendedExpiryDate")->nullable();
            $table->string("name")->nullable();
            $table->string("shippingAddress")->nullable();
            $table->string("taxAmount")->nullable();
            $table->string("status")->nullable();
            $table->string("storeCode")->nullable();
            $table->text('detailList')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
