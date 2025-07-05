<?php

namespace App\Controllers;

use App\Models\UserModel;

class User extends BaseController
{
    public function index()
    {
        $title = 'Daftar User';
        $model = new UserModel();
        $users = $model->findAll();

        return view('user/index', compact('users', 'title'));
    }

    public function login()
    {
        helper(['form']);

        // Check if this is a POST request (form submission)
        if ($this->request->getMethod() !== 'POST') {
            return view('user/login');
        }

        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        $session = session();
        $model = new UserModel();

        // Debug: Log input data
        log_message('info', 'Login attempt - Email: ' . $email);
        log_message('info', 'Login attempt - Password length: ' . strlen($password));

        // Check if email and password are provided
        if (empty($email) || empty($password)) {
            $session->setFlashdata('flash_msg', 'Email dan password harus diisi.');
            return redirect()->to('/user/login');
        }

        $user = $model->where('useremail', $email)->first();

        if ($user) {
            log_message('info', 'User found: ' . json_encode($user));
            $hashedPassword = $user['userpassword'];

            // Test password verification
            $passwordMatch = password_verify($password, $hashedPassword);
            log_message('info', 'Password match: ' . ($passwordMatch ? 'true' : 'false'));

            if ($passwordMatch) {
                $sessionData = [
                    'user_id'    => $user['id'],
                    'username'   => $user['username'],
                    'useremail'  => $user['useremail'],
                    'logged_in'  => true, // Konsisten dengan yang digunakan di template
                ];

                $session->set($sessionData);
                log_message('info', 'Login successful for user: ' . $user['username']);
                return redirect()->to('/admin/artikel');
            } else {
                log_message('warning', 'Password mismatch for user: ' . $email);
                $session->setFlashdata('flash_msg', 'Password salah.');
                return redirect()->to('/user/login');
            }
        } else {
            log_message('warning', 'User not found: ' . $email);
            $session->setFlashdata('flash_msg', 'Email tidak terdaftar.');
            return redirect()->to('/user/login');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/'); // Redirect ke home page setelah logout
    }

    public function createAdmin()
    {
        $model = new UserModel();

        // Check if admin already exists
        $existingUser = $model->where('useremail', 'admin@email.com')->first();

        if (!$existingUser) {
            $data = [
                'username'     => 'admin',
                'useremail'    => 'admin@email.com',
                'userpassword' => password_hash('admin123', PASSWORD_DEFAULT),
            ];

            if ($model->insert($data)) {
                echo "<div style='font-family: Arial; padding: 20px; max-width: 600px; margin: 0 auto;'>";
                echo "<h2 style='color: green;'>✅ Admin user created successfully!</h2>";
                echo "<div style='background: #f8f9fa; padding: 15px; border-radius: 5px; margin: 15px 0;'>";
                echo "<p><strong>Email:</strong> admin@email.com</p>";
                echo "<p><strong>Password:</strong> admin123</p>";
                echo "</div>";
                echo "<p><a href='" . base_url('user/login') . "' style='background: #007bff; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px;'>Login Now</a></p>";
                echo "</div>";
            } else {
                echo "<h2 style='color: red;'>❌ Failed to create admin user</h2>";
                echo "<pre>" . print_r($model->errors(), true) . "</pre>";
            }
        } else {
            // Update password to make sure it's correct
            $newPassword = password_hash('admin123', PASSWORD_DEFAULT);
            $model->update($existingUser['id'], ['userpassword' => $newPassword]);

            echo "<div style='font-family: Arial; padding: 20px; max-width: 600px; margin: 0 auto;'>";
            echo "<h2 style='color: blue;'>ℹ️ Admin user already exists! (Password updated)</h2>";
            echo "<div style='background: #f8f9fa; padding: 15px; border-radius: 5px; margin: 15px 0;'>";
            echo "<p><strong>Email:</strong> admin@email.com</p>";
            echo "<p><strong>Password:</strong> admin123</p>";
            echo "</div>";
            echo "<p><a href='" . base_url('user/login') . "' style='background: #007bff; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px;'>Login Now</a></p>";
            echo "</div>";
        }
    }

    public function testDb()
    {
        $model = new UserModel();

        echo "<div style='font-family: Arial; padding: 20px; max-width: 800px; margin: 0 auto;'>";
        echo "<h2>🔍 Database Connection Test</h2>";

        try {
            // Test database connection
            $db = \Config\Database::connect();
            echo "<p style='color: green;'>✅ Database connection: OK</p>";

            // Test if user table exists
            if ($db->tableExists('user')) {
                echo "<p style='color: green;'>✅ User table exists</p>";

                // Get all users
                $users = $model->findAll();
                echo "<p>📊 Total users: " . count($users) . "</p>";

                if (!empty($users)) {
                    echo "<h3>👥 Users in database:</h3>";
                    echo "<table border='1' style='border-collapse: collapse; width: 100%;'>";
                    echo "<tr><th>ID</th><th>Username</th><th>Email</th><th>Password Hash</th></tr>";
                    foreach ($users as $user) {
                        echo "<tr>";
                        echo "<td>" . $user['id'] . "</td>";
                        echo "<td>" . $user['username'] . "</td>";
                        echo "<td>" . $user['useremail'] . "</td>";
                        echo "<td>" . substr($user['userpassword'], 0, 20) . "...</td>";
                        echo "</tr>";
                    }
                    echo "</table>";
                } else {
                    echo "<p style='color: orange;'>⚠️ No users found in database</p>";
                }

                // Test admin user specifically
                $admin = $model->where('useremail', 'admin@email.com')->first();
                if ($admin) {
                    echo "<h3>🔐 Admin User Test:</h3>";
                    echo "<p>✅ Admin user found</p>";
                    echo "<p>Username: " . $admin['username'] . "</p>";
                    echo "<p>Email: " . $admin['useremail'] . "</p>";

                    // Test password verification
                    $testPassword = 'admin123';
                    $isValid = password_verify($testPassword, $admin['userpassword']);
                    echo "<p>Password verification for 'admin123': " . ($isValid ? "✅ Valid" : "❌ Invalid") . "</p>";
                } else {
                    echo "<p style='color: red;'>❌ Admin user not found</p>";
                }

            } else {
                echo "<p style='color: red;'>❌ User table does not exist</p>";
            }

        } catch (\Exception $e) {
            echo "<p style='color: red;'>❌ Database error: " . $e->getMessage() . "</p>";
        }

        echo "<br><p><a href='" . base_url('user/create-admin') . "' style='background: #28a745; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px;'>Create/Update Admin</a></p>";
        echo "<p><a href='" . base_url('user/login') . "' style='background: #007bff; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px;'>Go to Login</a></p>";
        echo "</div>";
    }

    public function testLogin()
    {
        $model = new UserModel();

        echo "<div style='font-family: Arial; padding: 20px; max-width: 800px; margin: 0 auto;'>";
        echo "<h2>🔐 Test Login Process</h2>";

        // Test credentials
        $testEmail = 'admin@email.com';
        $testPassword = 'admin123';

        echo "<h3>Testing with:</h3>";
        echo "<p>Email: " . $testEmail . "</p>";
        echo "<p>Password: " . $testPassword . "</p>";
        echo "<hr>";

        // Step 1: Find user
        echo "<h4>Step 1: Finding user in database</h4>";
        $user = $model->where('useremail', $testEmail)->first();

        if ($user) {
            echo "<p style='color: green;'>✅ User found!</p>";
            echo "<p>ID: " . $user['id'] . "</p>";
            echo "<p>Username: " . $user['username'] . "</p>";
            echo "<p>Email: " . $user['useremail'] . "</p>";
            echo "<p>Password Hash: " . substr($user['userpassword'], 0, 30) . "...</p>";

            // Step 2: Test password
            echo "<h4>Step 2: Testing password verification</h4>";
            $passwordMatch = password_verify($testPassword, $user['userpassword']);

            if ($passwordMatch) {
                echo "<p style='color: green;'>✅ Password verification successful!</p>";

                // Step 3: Test session creation
                echo "<h4>Step 3: Testing session creation</h4>";
                $sessionData = [
                    'user_id'    => $user['id'],
                    'username'   => $user['username'],
                    'useremail'  => $user['useremail'],
                    'logged_in'  => true,
                ];

                session()->set($sessionData);
                echo "<p style='color: green;'>✅ Session created successfully!</p>";
                echo "<p>Session data: " . json_encode($sessionData) . "</p>";

                // Check if session is working
                if (session()->get('logged_in')) {
                    echo "<p style='color: green;'>✅ Session is working! User is now logged in.</p>";
                    echo "<p><a href='" . base_url('admin/artikel') . "' style='background: #28a745; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px;'>Go to Admin Dashboard</a></p>";
                } else {
                    echo "<p style='color: red;'>❌ Session not working properly.</p>";
                }

            } else {
                echo "<p style='color: red;'>❌ Password verification failed!</p>";
                echo "<p>Stored hash: " . $user['userpassword'] . "</p>";
                echo "<p>Test password: " . $testPassword . "</p>";

                // Try to create new hash
                $newHash = password_hash($testPassword, PASSWORD_DEFAULT);
                echo "<p>New hash would be: " . $newHash . "</p>";

                // Update password
                echo "<h4>Updating password...</h4>";
                $model->update($user['id'], ['userpassword' => $newHash]);
                echo "<p style='color: blue;'>Password updated. Try login again.</p>";
            }

        } else {
            echo "<p style='color: red;'>❌ User not found!</p>";
            echo "<p>Creating user now...</p>";

            $data = [
                'username'     => 'admin',
                'useremail'    => $testEmail,
                'userpassword' => password_hash($testPassword, PASSWORD_DEFAULT),
            ];

            if ($model->insert($data)) {
                echo "<p style='color: green;'>✅ User created successfully!</p>";
            } else {
                echo "<p style='color: red;'>❌ Failed to create user.</p>";
                echo "<pre>" . print_r($model->errors(), true) . "</pre>";
            }
        }

        echo "<br><p><a href='" . base_url('user/login') . "' style='background: #007bff; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px;'>Try Login Now</a></p>";
        echo "</div>";
    }

    public function profile()
    {
        // Cek apakah user sudah login
        if (!session()->get('logged_in')) {
            return redirect()->to('/user/login');
        }

        $data = [
            'title' => 'Profile Admin - Portal Berita',
            'user' => [
                'username' => session()->get('username'),
                'email' => session()->get('useremail'),
                'user_id' => session()->get('user_id')
            ]
        ];

        return view('user/profile', $data);
    }
}
