-- Fix artikel table untuk menampilkan di home page

-- Tambahkan kolom status jika belum ada
ALTER TABLE `artikel` ADD COLUMN IF NOT EXISTS `status` tinyint(1) DEFAULT 1;

-- Tambahkan kolom id_kategori jika belum ada  
ALTER TABLE `artikel` ADD COLUMN IF NOT EXISTS `id_kategori` int(11) DEFAULT 1;

-- Update semua artikel yang ada agar memiliki status aktif
UPDATE `artikel` SET `status` = 1 WHERE `status` IS NULL OR `status` = 0;

-- Update semua artikel yang ada agar memiliki kategori default
UPDATE `artikel` SET `id_kategori` = 1 WHERE `id_kategori` IS NULL OR `id_kategori` = 0;

-- Pastikan ada kategori default
INSERT IGNORE INTO `kategori` (`id_kategori`, `nama_kategori`, `slug_kategori`) VALUES (1, 'Umum', 'umum');
