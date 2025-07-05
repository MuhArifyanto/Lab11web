<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        // Tampilkan halaman home untuk semua user
        $model = new \App\Models\ArtikelModel();

        // Ambil artikel terbaru untuk ditampilkan di home
        try {
            // Cek apakah tabel kategori ada
            $db = \Config\Database::connect();
            $kategoriExists = $db->tableExists('kategori');

            if ($kategoriExists) {
                // Jika tabel kategori ada, gunakan join
                $artikel = $model
                    ->select('artikel.*, kategori.nama_kategori')
                    ->join('kategori', 'kategori.id_kategori = artikel.id_kategori', 'left')
                    ->orderBy('artikel.id', 'DESC')
                    ->limit(6)
                    ->findAll();
            } else {
                // Jika tabel kategori tidak ada, ambil artikel saja
                $artikel = $model
                    ->orderBy('artikel.id', 'DESC')
                    ->limit(6)
                    ->findAll();

                // Tambahkan nama_kategori default
                foreach ($artikel as &$item) {
                    $item['nama_kategori'] = 'Umum';
                }
            }
        } catch (\Exception $e) {
            // Jika ada error, ambil artikel tanpa join
            $artikel = $model
                ->orderBy('artikel.id', 'DESC')
                ->limit(6)
                ->findAll();

            // Tambahkan nama_kategori default
            foreach ($artikel as &$item) {
                $item['nama_kategori'] = 'Umum';
            }
        }

        return view('home/index', [
            'title' => 'Portal Berita - Terkini & Terpercaya',
            'artikel' => $artikel
        ]);
    }

    public function debugArtikel()
    {
        $model = new \App\Models\ArtikelModel();

        echo "<div style='font-family: Arial; padding: 20px; max-width: 1000px; margin: 0 auto;'>";
        echo "<h2>🔍 Debug Artikel untuk Home Page</h2>";

        // Test 1: Get all articles without any filter
        echo "<h3>Test 1: Semua Artikel (tanpa filter)</h3>";
        $allArtikel = $model->findAll();
        echo "<p>Total artikel: " . count($allArtikel) . "</p>";

        if (!empty($allArtikel)) {
            echo "<table border='1' style='border-collapse: collapse; width: 100%; margin: 10px 0;'>";
            echo "<tr><th>ID</th><th>Judul</th><th>Status</th><th>ID Kategori</th><th>Gambar</th></tr>";
            foreach ($allArtikel as $item) {
                echo "<tr>";
                echo "<td>" . ($item['id'] ?? 'N/A') . "</td>";
                echo "<td>" . htmlspecialchars(substr($item['judul'] ?? 'N/A', 0, 50)) . "</td>";
                echo "<td>" . ($item['status'] ?? 'N/A') . "</td>";
                echo "<td>" . ($item['id_kategori'] ?? 'N/A') . "</td>";
                echo "<td>" . ($item['gambar'] ?? 'No Image') . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "<p style='color: red;'>❌ Tidak ada artikel ditemukan</p>";
        }

        // Test 2: Check table structure
        echo "<h3>Test 2: Struktur Tabel Artikel</h3>";
        try {
            $db = \Config\Database::connect();
            $fields = $db->getFieldData('artikel');
            echo "<p>Kolom yang ada di tabel artikel:</p>";
            echo "<ul>";
            foreach ($fields as $field) {
                echo "<li><strong>" . $field->name . "</strong> (" . $field->type . ")</li>";
            }
            echo "</ul>";
        } catch (\Exception $e) {
            echo "<p style='color: red;'>Error: " . $e->getMessage() . "</p>";
        }

        // Test 3: Check kategori table
        echo "<h3>Test 3: Cek Tabel Kategori</h3>";
        try {
            $kategoriExists = $db->tableExists('kategori');
            if ($kategoriExists) {
                echo "<p style='color: green;'>✅ Tabel kategori ada</p>";
                $kategori = $db->table('kategori')->get()->getResultArray();
                echo "<p>Total kategori: " . count($kategori) . "</p>";
                if (!empty($kategori)) {
                    echo "<ul>";
                    foreach ($kategori as $kat) {
                        echo "<li>ID: " . $kat['id_kategori'] . " - " . $kat['nama_kategori'] . "</li>";
                    }
                    echo "</ul>";
                }
            } else {
                echo "<p style='color: red;'>❌ Tabel kategori tidak ada</p>";
            }
        } catch (\Exception $e) {
            echo "<p style='color: red;'>Error kategori: " . $e->getMessage() . "</p>";
        }

        // Test 4: Query yang digunakan di Home
        echo "<h3>Test 4: Query Home (dengan filter status = 1)</h3>";
        try {
            $homeArtikel = $model
                ->select('artikel.*, kategori.nama_kategori')
                ->join('kategori', 'kategori.id_kategori = artikel.id_kategori', 'left')
                ->where('artikel.status', 1)
                ->orderBy('artikel.id', 'DESC')
                ->limit(6)
                ->findAll();

            echo "<p>Artikel dengan status = 1: " . count($homeArtikel) . "</p>";

            if (!empty($homeArtikel)) {
                echo "<table border='1' style='border-collapse: collapse; width: 100%; margin: 10px 0;'>";
                echo "<tr><th>ID</th><th>Judul</th><th>Kategori</th><th>Status</th></tr>";
                foreach ($homeArtikel as $item) {
                    echo "<tr>";
                    echo "<td>" . $item['id'] . "</td>";
                    echo "<td>" . htmlspecialchars(substr($item['judul'], 0, 50)) . "</td>";
                    echo "<td>" . ($item['nama_kategori'] ?? 'No Category') . "</td>";
                    echo "<td>" . $item['status'] . "</td>";
                    echo "</tr>";
                }
                echo "</table>";
            }
        } catch (\Exception $e) {
            echo "<p style='color: red;'>Error query home: " . $e->getMessage() . "</p>";
        }

        // Test 5: Query tanpa filter status
        echo "<h3>Test 5: Query Tanpa Filter Status</h3>";
        try {
            $noFilterArtikel = $model
                ->select('artikel.*, kategori.nama_kategori')
                ->join('kategori', 'kategori.id_kategori = artikel.id_kategori', 'left')
                ->orderBy('artikel.id', 'DESC')
                ->limit(6)
                ->findAll();

            echo "<p>Artikel tanpa filter status: " . count($noFilterArtikel) . "</p>";

            if (!empty($noFilterArtikel)) {
                echo "<table border='1' style='border-collapse: collapse; width: 100%; margin: 10px 0;'>";
                echo "<tr><th>ID</th><th>Judul</th><th>Kategori</th><th>Status</th></tr>";
                foreach ($noFilterArtikel as $item) {
                    echo "<tr>";
                    echo "<td>" . $item['id'] . "</td>";
                    echo "<td>" . htmlspecialchars(substr($item['judul'], 0, 50)) . "</td>";
                    echo "<td>" . ($item['nama_kategori'] ?? 'No Category') . "</td>";
                    echo "<td>" . ($item['status'] ?? 'NULL') . "</td>";
                    echo "</tr>";
                }
                echo "</table>";
            }
        } catch (\Exception $e) {
            echo "<p style='color: red;'>Error query no filter: " . $e->getMessage() . "</p>";
        }

        echo "<br><p><a href='" . base_url('/') . "' style='background: #007bff; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px;'>Kembali ke Home</a></p>";
        echo "<p><a href='" . base_url('fix-artikel') . "' style='background: #28a745; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px;'>Fix Artikel Table</a></p>";
        echo "</div>";
    }

    public function fixArtikel()
    {
        $db = \Config\Database::connect();

        echo "<div style='font-family: Arial; padding: 20px; max-width: 800px; margin: 0 auto;'>";
        echo "<h2>🔧 Fix Artikel Table</h2>";

        try {
            // Add status column if not exists
            echo "<h3>Step 1: Menambahkan kolom status</h3>";
            $db->query("ALTER TABLE `artikel` ADD COLUMN IF NOT EXISTS `status` tinyint(1) DEFAULT 1");
            echo "<p style='color: green;'>✅ Kolom status ditambahkan/sudah ada</p>";

            // Add id_kategori column if not exists
            echo "<h3>Step 2: Menambahkan kolom id_kategori</h3>";
            $db->query("ALTER TABLE `artikel` ADD COLUMN IF NOT EXISTS `id_kategori` int(11) DEFAULT 1");
            echo "<p style='color: green;'>✅ Kolom id_kategori ditambahkan/sudah ada</p>";

            // Create kategori table if not exists
            echo "<h3>Step 3: Membuat tabel kategori</h3>";
            $createKategori = "CREATE TABLE IF NOT EXISTS `kategori` (
                `id_kategori` int(11) NOT NULL AUTO_INCREMENT,
                `nama_kategori` varchar(100) NOT NULL,
                `slug_kategori` varchar(100) NOT NULL,
                PRIMARY KEY (`id_kategori`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";
            $db->query($createKategori);
            echo "<p style='color: green;'>✅ Tabel kategori dibuat/sudah ada</p>";

            // Insert default category
            echo "<h3>Step 4: Menambahkan kategori default</h3>";
            $db->query("INSERT IGNORE INTO `kategori` (`id_kategori`, `nama_kategori`, `slug_kategori`) VALUES (1, 'Umum', 'umum')");
            echo "<p style='color: green;'>✅ Kategori default ditambahkan</p>";

            // Update existing articles
            echo "<h3>Step 5: Update artikel yang ada</h3>";
            $db->query("UPDATE `artikel` SET `status` = 1 WHERE `status` IS NULL OR `status` = 0");
            $db->query("UPDATE `artikel` SET `id_kategori` = 1 WHERE `id_kategori` IS NULL OR `id_kategori` = 0");
            echo "<p style='color: green;'>✅ Artikel yang ada sudah diupdate</p>";

            // Test query
            echo "<h3>Step 6: Test query artikel</h3>";
            $model = new \App\Models\ArtikelModel();
            $artikel = $model
                ->select('artikel.*, kategori.nama_kategori')
                ->join('kategori', 'kategori.id_kategori = artikel.id_kategori', 'left')
                ->orderBy('artikel.id', 'DESC')
                ->limit(6)
                ->findAll();

            echo "<p>Artikel yang akan muncul di home: " . count($artikel) . "</p>";

            if (!empty($artikel)) {
                echo "<table border='1' style='border-collapse: collapse; width: 100%; margin: 10px 0;'>";
                echo "<tr><th>ID</th><th>Judul</th><th>Kategori</th><th>Status</th></tr>";
                foreach ($artikel as $item) {
                    echo "<tr>";
                    echo "<td>" . $item['id'] . "</td>";
                    echo "<td>" . htmlspecialchars(substr($item['judul'], 0, 50)) . "</td>";
                    echo "<td>" . ($item['nama_kategori'] ?? 'No Category') . "</td>";
                    echo "<td>" . ($item['status'] ?? 'NULL') . "</td>";
                    echo "</tr>";
                }
                echo "</table>";
            }

            echo "<h2 style='color: green;'>🎉 Fix Completed!</h2>";
            echo "<p>Artikel sekarang seharusnya muncul di halaman home.</p>";

        } catch (\Exception $e) {
            echo "<p style='color: red;'>❌ Error: " . $e->getMessage() . "</p>";
        }

        echo "<br><p><a href='" . base_url('/') . "' style='background: #007bff; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px;'>Test Home Page</a></p>";
        echo "</div>";
    }

    public function testArtikelDetail()
    {
        $model = new \App\Models\ArtikelModel();

        echo "<div style='font-family: Arial; padding: 20px; max-width: 800px; margin: 0 auto;'>";
        echo "<h2>🔗 Test Artikel Detail Links</h2>";

        // Get all articles
        $artikel = $model->findAll();

        if (!empty($artikel)) {
            echo "<h3>Artikel yang tersedia:</h3>";
            echo "<table border='1' style='border-collapse: collapse; width: 100%; margin: 10px 0;'>";
            echo "<tr><th>ID</th><th>Judul</th><th>Slug</th><th>Link Detail</th></tr>";

            foreach ($artikel as $item) {
                $slug = $item['slug'] ?? 'artikel-' . $item['id'];
                $detailUrl = base_url('artikel/' . $slug);

                echo "<tr>";
                echo "<td>" . $item['id'] . "</td>";
                echo "<td>" . htmlspecialchars(substr($item['judul'], 0, 30)) . "...</td>";
                echo "<td>" . $slug . "</td>";
                echo "<td><a href='" . $detailUrl . "' target='_blank' style='color: #007bff;'>Test Link</a></td>";
                echo "</tr>";
            }
            echo "</table>";

            // Test first article
            if (!empty($artikel[0])) {
                $firstSlug = $artikel[0]['slug'] ?? 'artikel-' . $artikel[0]['id'];
                echo "<h3>Quick Test:</h3>";
                echo "<p><a href='" . base_url('artikel/' . $firstSlug) . "' style='background: #28a745; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px;'>Test Artikel Pertama</a></p>";
            }
        } else {
            echo "<p style='color: red;'>Tidak ada artikel ditemukan</p>";
        }

        echo "<br><p><a href='" . base_url('/') . "' style='background: #007bff; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px;'>Kembali ke Home</a></p>";
        echo "</div>";
    }

    public function debugSession()
    {
        echo "<h1>Debug Session</h1>";
        echo "<h2>Session Data:</h2>";
        echo "<pre>";
        print_r(session()->get());
        echo "</pre>";

        echo "<h2>Session Status:</h2>";
        echo "<p>Session ID: " . session_id() . "</p>";
        echo "<p>Logged in: " . (session()->get('logged_in') ? 'YES' : 'NO') . "</p>";
        echo "<p>User ID: " . (session()->get('user_id') ?? 'Not set') . "</p>";
        echo "<p>Username: " . (session()->get('username') ?? 'Not set') . "</p>";

        echo "<h2>Test Session:</h2>";
        session()->set('test_key', 'test_value_' . time());
        echo "<p>Set test_key: " . session()->get('test_key') . "</p>";

        echo "<p><a href='" . base_url('/') . "'>Kembali ke Home</a></p>";
    }
}
