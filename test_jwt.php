<?php
require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

try {
    $admin = App\Models\Admin::first();
    echo "Admin ID: " . $admin->id . "\n";
    $token = auth('api_admin')->login($admin);
    echo "Token: " . $token . "\n";
} catch (\Exception $e) {
    echo "Exception: " . get_class($e) . "\n" . $e->getMessage() . "\n";
}
