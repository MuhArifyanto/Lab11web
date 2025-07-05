<?= $this->include('template/admin_header'); ?>

<h2 class="mt-4 mb-4"><?= esc($title); ?></h2>

<!-- Form Pencarian dan Filter -->
<form method="get" class="row g-2 mb-4" role="search">
    <div class="col-md-4">
        <input type="text" name="q" value="<?= esc($q); ?>" class="form-control" placeholder="Cari judul artikel">
    </div>
    <div class="col-md-4">
        <select name="kategori_id" class="form-select">
            <option value="">Semua Kategori</option>
            <?php foreach ($kategori as $k): ?>
                <option value="<?= esc($k['id_kategori']); ?>" <?= ($kategori_id == $k['id_kategori']) ? 'selected' : ''; ?>>
                    <?= esc($k['nama_kategori']); ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="col-md-4">
        <button type="submit" class="btn btn-primary w-100">Cari</button>
    </div>
</form>

<!-- Tabel Artikel -->
<div class="table-responsive">
    <table class="table table-bordered table-hover align-middle">
        <thead class="table-light text-center">
            <tr>
                <th>ID</th>
                <th>Gambar</th>
                <th>Judul</th>
                <th>Kategori</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($artikel)): ?>
                <?php foreach ($artikel as $item): ?>
                    <tr>
                        <td class="text-center"><?= esc($item['id']); ?></td>
                        <td class="text-center">
                            <?php if (!empty($item['gambar'])): ?>
                                <img src="<?= base_url('gambar/' . $item['gambar']); ?>" 
                                     alt="<?= esc($item['judul']); ?>" 
                                     class="img-thumbnail" 
                                     style="width: 80px; height: 60px; object-fit: cover;">
                            <?php else: ?>
                                <span class="text-muted">No Image</span>
                            <?php endif; ?>
                        </td>
                        <td>
                            <strong><?= esc($item['judul']); ?></strong>
                            <p><small><?= esc(substr($item['isi'], 0, 50)); ?>...</small></p>
                        </td>
                        <td class="text-center"><?= esc($item['nama_kategori']); ?></td>
                        <td class="text-center">
                            <span class="badge bg-<?= $item['status'] ? 'success' : 'secondary'; ?>">
                                <?= $item['status'] ? 'Aktif' : 'Draft'; ?>
                            </span>
                        </td>
                        <td class="text-center">
                            <a href="<?= base_url('admin/artikel/edit/' . $item['id']); ?>" class="btn btn-sm btn-warning">Ubah</a>
                            <a href="<?= base_url('admin/artikel/delete/' . $item['id']); ?>" 
                               class="btn btn-sm btn-danger" 
                               onclick="return confirm('Yakin ingin menghapus artikel ini?');">
                               Hapus
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="6" class="text-center">Data tidak ditemukan.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<!-- Pagination -->
<div class="d-flex justify-content-start">
    <?= $pager->only(['q', 'kategori_id'])->links(); ?>
</div>

<?= $this->include('template/admin_footer'); ?>
