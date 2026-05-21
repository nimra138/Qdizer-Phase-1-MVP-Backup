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
        Schema::create('companies', function (Blueprint $table) {
    $table->id();

    $table->foreignId('user_id')->constrained()->onDelete('cascade');

    $table->string('company_name');

    $table->string('business_category');

    $table->string('logo')->nullable();

    $table->string('phone_number');
    $table->string('email')->nullable();
    $table->text('address')->nullable();

    // VAT SYSTEM
    $table->boolean('vat_registered')->default(false);
    $table->string('vat_number')->nullable();

    // UAE DEFAULTS (Phase 1 fixed)
    $table->string('country')->default('United Arab Emirates');
    $table->string('currency')->default('AED');
    $table->decimal('vat_rate', 5, 2)->default(5);

    $table->text('default_terms')->nullable();

    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
