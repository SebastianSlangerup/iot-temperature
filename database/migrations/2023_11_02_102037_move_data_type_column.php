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
        Schema::table('sensors', function (Blueprint $table) {
            $table->dropConstrainedForeignId('data_type_id');
            $table->removeColumn('data_type_id');
        });

        Schema::table('data', function (Blueprint $table) {
            $table->foreignId('data_type_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('sensors', function (Blueprint $table) {
            $table->foreignId('data_type_id')->constrained();
        });

        Schema::table('data', function (Blueprint $table) {
            $table->dropConstrainedForeignId('data_type_id');
            $table->removeColumn('data_type_id');
        });
    }
};
