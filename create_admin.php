<?php

// Script untuk membuat user admin
require_once 'vendor/autoload.php';

// Load CodeIgniter
$app = \Config\Services::codeigniter();
$app->initialize();

// Load UserModel
$userModel = new \App\Models\UserModel();

// Check if admin user already exists
$existingUser = $userModel->where('useremail', 'admin@admin.com')->first();

if (!$existingUser) {
    $data = [
        'username'     => 'admin',
        'useremail'    => 'admin@admin.com',
        'userpassword' => password_hash('admin123', PASSWORD_DEFAULT),
    ];

    if ($userModel->insert($data)) {
        echo "✅ Admin user created successfully!\n";
        echo "📧 Email: admin@admin.com\n";
        echo "🔑 Password: admin123\n";
        echo "\n🌐 You can now login at: http://localhost:8080/user/login\n";
    } else {
        echo "❌ Failed to create admin user.\n";
        print_r($userModel->errors());
    }
} else {
    echo "ℹ️  Admin user already exists!\n";
    echo "📧 Email: admin@admin.com\n";
    echo "🔑 Password: admin123\n";
    echo "\n🌐 You can login at: http://localhost:8080/user/login\n";
}
