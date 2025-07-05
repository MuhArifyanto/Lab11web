# PRAKTIKUM 4-6

## Profil
| Nama | Kelas | NIM | Mata Kuliah | Dosen |
|------|-------|-----|-------------|-------|
| Muhammad Arif Mulyanto   |  TI.23.A.5     | 312310359  |    Pemograman web 2         |  Agung Nugroho, S.Kom., M.Kom.     |

# Praktikum 4: Framework Lanjutan (Modul Login)

# Langkah-langkah Praktikum

Untuk memulai membuat modul Login, yang perlu disiapkan adalah database server menggunakan MySQL. Pastikan MySQL Server sudah dapat dijalankan melalui XAMPP.

# 1. Persiapkan Database
Buat tabel user pada database dengan SQL berikut:

```
CREATE TABLE user (
  id INT(11) auto_increment,
  username VARCHAR(200) NOT NULL,
  useremail VARCHAR(200),
  userpassword VARCHAR(200),
  PRIMARY KEY(id)
);
```
![{2F06A146-1684-4D0B-BD7E-B0B83962B454}](https://github.com/user-attachments/assets/ac0fe391-a784-4344-a346-399ce596db17)

Selanjutnya adalah membuat Model untuk memproses data Login. Buat file baru pada direktori app/Models dengan nama UserModel.php

```php
<?php
namespace App\Models;
use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'user';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['username', 'useremail', 'userpassword'];
}
```

# 3.Membuat Controller User
Buat Controller baru dengan nama User.php pada direktori app/Controllers.

Kemudian tambahkan method index() untuk menampilkan daftar user, dan method login() untuk proses login.

```php
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

```

# 4. Membuat View Login
Buat direktori baru dengan nama user pada direktori app/views, kemudian buat file baru dengan nama login.php.

```html
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - Portal Berita Terkini & Terpercaya</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #007bff 0%, #0056b3 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
        }
        .login-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 15px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
        }
        .login-header {
            background: linear-gradient(135deg, #007bff, #0056b3);
            color: white;
            border-radius: 15px 15px 0 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-4">
                <div class="card login-card border-0">
                    <!-- Header -->
                    <div class="login-header text-center py-4">
                        <i class="bi bi-newspaper" style="font-size: 3rem;"></i>
                        <h3 class="mt-2 mb-0">Portal Berita</h3>
                        <p class="mb-0">Admin Login</p>
                    </div>

                    <!-- Body -->
                    <div class="card-body p-4">
                        <?php if (session()->getFlashdata('flash_msg')): ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <i class="bi bi-exclamation-triangle me-2"></i>
                                <?= session()->getFlashdata('flash_msg') ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        <?php endif; ?>

                        <form action="<?= base_url('user/login') ?>" method="post">
                            <?= csrf_field() ?>

                            <div class="mb-3">
                                <label for="email" class="form-label">
                                    <i class="bi bi-envelope me-1"></i>Email Address
                                </label>
                                <input
                                    type="email"
                                    name="email"
                                    class="form-control form-control-lg"
                                    id="email"
                                    value="<?= esc(set_value('email')) ?>"
                                    placeholder="admin@email.com"
                                    required
                                    autofocus
                                >
                            </div>

                            <div class="mb-4">
                                <label for="password" class="form-label">
                                    <i class="bi bi-lock me-1"></i>Password
                                </label>
                                <input
                                    type="password"
                                    name="password"
                                    class="form-control form-control-lg"
                                    id="password"
                                    placeholder="Enter your password"
                                    required
                                >
                            </div>

                            <div class="d-grid mb-3">
                                <button type="submit" class="btn btn-primary btn-lg">
                                    <i class="bi bi-box-arrow-in-right me-2"></i>Login
                                </button>
                            </div>
                        </form>

                        <!-- Back to Home -->
                        <div class="text-center">
                            <a href="<?= base_url('/') ?>" class="btn btn-outline-secondary">
                                <i class="bi bi-arrow-left me-1"></i>Back to Home
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

```

# 5. Membuat Seeder untuk Database

Seeder database berfungsi untuk mengisi data awal atau data percobaan. Dalam rangka pengujian modul login, kita perlu menambahkan data akun pengguna beserta kata sandinya ke dalam tabel user. Untuk itu, kita perlu membuat seeder khusus untuk tabel user. Buka Command Line Interface (CLI), lalu jalankan perintah berikut:

```
php spark make:seeder UserSeeder
```

Selanjutnya, buka file UserSeeder.php yang berada di lokasi direktori/app/Database/Seeds/UserSeeder.php kemudian isi dengan kode berikut:

```php
<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $model = model('UserModel');
        $model->insert([
            'username' => 'admin',
            'useremail' => 'admin@email.com',
            'userpassword' => password_hash('admin123', PASSWORD_DEFAULT),
        ]);
    }
}
```

Selanjutnya buka kembali CLI dan ketik perintah berikut:

```
php spark db:seed UserSeeder
```

# uji coba login
![login](https://github.com/user-attachments/assets/2a2a6a83-5640-47ab-9faa-84ae96c6218f)

# 6. Menambahkan Auth Filter
Selanjutnya membuat filer untuk halaman admin. Buat file baru dengan nama Auth.php pada direktori app/Filters.

```php
<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class Auth implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // Cek login user
        if (! session()->get('logged_in')) {
            return redirect()->to('/user/login');
        }

        return null;
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        return $response;
    }
}

```

Selanjutnya buka file app/Config/Filters.php tambahkan kode berikut:

```
'auth' => App\Filters\Auth::class
```

![{71E254F1-C072-4450-96D7-D94FFBCB0BE4}](https://github.com/user-attachments/assets/a366f888-faee-4c25-8a05-e6a665d95603)


Selanjutnya buka file app/Config/Routes.php dan sesuaikan kodenya.

# 7. Percobaan Akses Menu Admin
Buka url dengan alamat http://localhost:8080/admin/artikel ketika alamat tersebut diakses maka, akan dimuculkan halaman login.

![auth](https://github.com/user-attachments/assets/eed96cbe-3714-4b78-b4e8-3547f45f6fe3)

# 8. Fungsi Logout
Tambahkan method logout pada Controller User seperti berikut:

```
public function logout()
    {
        session()->destroy();
        return redirect()->to('/user/login');
    }
```

# Praktikum 5: Pagination dan Pencarian

# Langkah-Langkah Praktikum
# 1. Menerapkan Pagination
Pagination adalah teknik yang digunakan untuk membatasi jumlah data yang ditampilkan dalam satu halaman pada sebuah situs web. Tujuannya adalah untuk membagi data dalam jumlah besar menjadi beberapa halaman agar tampilan menjadi lebih rapi dan mudah diakses.

Di CodeIgniter 4, fitur pagination sudah disediakan melalui Library bawaan, sehingga proses implementasinya cukup sederhana.

Untuk menerapkan pagination, silakan buka kembali Controller bernama Artikel, lalu lakukan penyesuaian pada method admin_index seperti contoh berikut:

```
public function admin_index()
    {
        $title = 'Daftar Artikel';
        $model = new ArtikelModel();
        $kategoriModel = new KategoriModel();

        // Ambil keyword pencarian & filter kategori
        $q = $this->request->getGet('q') ?? '';
        $kategori_id = $this->request->getGet('kategori_id') ?? '';

        // Bangun query
        $builder = $model
            ->select('artikel.*, kategori.nama_kategori')
            ->join('kategori', 'kategori.id_kategori = artikel.id_kategori', 'left');

        if (!empty($q)) {
            $builder->like('artikel.judul', $q);
        }

        if (!empty($kategori_id)) {
            $builder->where('artikel.id_kategori', $kategori_id);
        }

        $data = [
            'title' => $title,
            'artikel' => $builder->paginate(10),
            'pager' => $model->pager,
            'q' => $q,
            'kategori_id' => $kategori_id,
            'kategori' => $kategoriModel->findAll(),
        ];

        return view('artikel/admin_index', $data);
    }
```

Kemudian buka file views/artikel/admin_index.php dan tambahkan kode berikut dibawah deklarasi tabel data.

```
<?= $pager->links(); ?>
```

Selanjutnya buka kembali menu daftar artikel, tambahkan data lagi untuk melihat hasilnya.

![{71C9B2A5-D2A2-47D0-BFFA-56705F8D09A8}](https://github.com/user-attachments/assets/9b26c7b4-ea7d-486f-8a82-331711fce193)

# 2. Membuat Pencarian
Pencarian data digunakan untuk memfilter data.

Untuk membuat pencarian data, buka kembali Controller Artikel, pada method admin_index ubah kodenya seperti berikut:

```
public function admin_index()
    {
        $title = 'Daftar Artikel';
        $q = $this->request->getVar('q') ?? '';
        $model = new ArtikelModel();
        $data = [
            'title' => $title,
            'q' => $q,
            'artikel' => $model->like('judul', $q)->paginate(10), # data dibatasi 10 record per halaman
            'pager' => $model->pager,
        ];
        return view('artikel/admin_index', $data);
    }
```

Kemudian buka kembali file views/artikel/admin_index.php dan tambahkan form pencarian sebelum deklarasi tabel seperti berikut:

```
<form method="get" class="form-search">
    <input type="text" name="q" value="<?= $q; ?>" placeholder="Cari data">
    <input type="submit" value="Cari" class="btn btn-primary">
</form>
```

Dan pada link pager ubah seperti berikut.

```
<?= $pager->only(['q'])->links(); ?>
```

# 3. Uji Coba Pagination dan Pencarian
Buka kembali halaman admin artikel, lalu masukkan kata kunci tertentu pada kolom pencarian untuk memastikan fitur pencarian berfungsi dengan baik.

![search](https://github.com/user-attachments/assets/c6edb296-d6dc-435d-9e74-2d67ad122b07)

# Praktikum 6: Upload File Gambar

# Langkah-langkah Praktikum
# 1. Upload Gambar pada Artikel
Menambahkan fungsi unggah gambar pada tambah artikel.

Buka kembali Controller Artikel pada project sebelumnya, sesuaikan kode pada method add seperti berikut:

```
public function add()
    {
        // validasi data.
        $validation = \Config\Services::validation();
        $validation->setRules(['judul' => 'required']);
        $isDataValid = $validation->withRequest($this->request)->run();
        if ($isDataValid) {
            $file = $this->request->getFile('gambar');
            $file->move(ROOTPATH . 'public/gambar');
            $artikel = new ArtikelModel();
            $artikel->insert([
                'judul' => $this->request->getPost('judul'),
                'isi' => $this->request->getPost('isi'),
                'slug' => url_title($this->request->getPost('judul')),
                'gambar' => $file->getName(),
            ]);
            return redirect('admin/artikel');
        }
        $title = "Tambah Artikel";
        return view('artikel/form_add', compact('title'));
    }
```

# 2. Modifikasi View Artikel

Kemudian pada file views/artikel/form_add.php tambahkan field input file seperti berikut.

```
<p>
    <input type="file" name="gambar">
</p>
```

Dan sesuaikan tag form dengan menambahkan ecrypt type seperti berikut.

```
<form action="" method="post" enctype="multipart/form-data">
```

# 3. Pengujian Fitur Unggah Gambar

Lakukan percobaan untuk memastikan proses unggah gambar berjalan dengan baik. 

Akses menu tambah artikel dan uji coba upload gambar.

![add file](https://github.com/user-attachments/assets/ee0c3d9b-25d6-4315-8290-a4e3023f4963)


# LAPORAN PRAKTIKUM 

1. Kerjakan semua latihan yang diberikan sesuai urutannya.
2. Screenshot setiap perubahannya.3.  Update file README.md dan tuliskan penjelasan dari setiap langkah praktikum beserta screenshotnya.
4. Commit hasilnya pada repository masing-masing.
5. Kirim URL repository pada e-learning ecampus
