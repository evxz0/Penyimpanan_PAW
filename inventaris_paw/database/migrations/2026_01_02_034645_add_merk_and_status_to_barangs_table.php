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
        Schema::table('barangs', function (Blueprint $table) {
            if (!Schema::hasColumn('barangs', 'merk')) {
                $table->string('merk')->nullable();
            }
            if (!Schema::hasColumn('barangs', 'status')) {
                $table->string('status')->default('baik');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('barangs', function (Blueprint $table) {
            $table->dropColumn(['merk', 'status']);
        });
    }
};
