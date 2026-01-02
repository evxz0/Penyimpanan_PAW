<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

try {
    Schema::table('barangs', function (Blueprint $table) {
        $table->string('merk')->nullable();
    });
    echo "Column 'merk' added successfully.\n";
} catch (\Exception $e) {
    echo "Error adding 'merk': " . $e->getMessage() . "\n";
}

try {
    Schema::table('barangs', function (Blueprint $table) {
        $table->string('status')->default('baik');
    });
    echo "Column 'status' added successfully.\n";
} catch (\Exception $e) {
    echo "Error adding 'status': " . $e->getMessage() . "\n";
}
