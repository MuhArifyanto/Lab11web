-- Buat tabel kategori
CREATE TABLE IF NOT EXISTS `kategori` (
  `id_kategori` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(100) NOT NULL,
  `slug_kategori` varchar(100) NOT NULL,
  PRIMARY KEY (`id_kategori`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Insert data kategori
INSERT INTO `kategori` (`nama_kategori`, `slug_kategori`) VALUES
('Teknologi', 'teknologi'),
('Olahraga', 'olahraga'),
('Politik', 'politik'),
('Ekonomi', 'ekonomi'),
('Hiburan', 'hiburan');

-- Tambahkan kolom id_kategori ke tabel artikel jika belum ada
ALTER TABLE `artikel` ADD COLUMN IF NOT EXISTS `id_kategori` int(11) DEFAULT 1;

-- Update artikel yang sudah ada dengan kategori default (Teknologi)
UPDATE `artikel` SET `id_kategori` = 1 WHERE `id_kategori` IS NULL OR `id_kategori` = 0;
