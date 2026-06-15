<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('quotations', function (Blueprint $table) {
          
            $table->dropUnique('quotations_quotation_number_unique');

            $table->unique(['user_id', 'quotation_number']);
        });
    }

    public function down(): void
    {
        Schema::table('quotations', function (Blueprint $table) {
            $table->dropUnique(['user_id', 'quotation_number']);
            $table->unique('quotation_number');
        });
    }
};
