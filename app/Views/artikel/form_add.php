<?= $this->include('template/admin_header'); ?>

<div class="d-flex justify-content-between align-items-center mb-3">
    <h3 class="fw-bold"><?= $title; ?></h3>
    <a href="<?= base_url('admin/artikel'); ?>" class="btn btn-secondary">Kembali</a>
</div>

<?php if (isset($validation)): ?>
    <div class="alert alert-danger">
        <?= $validation->listErrors(); ?>
    </div>
<?php endif; ?>

<div class="card">
    <div class="card-body">
        <form action="<?= base_url('admin/artikel/add'); ?>" method="post" enctype="multipart/form-data">
            <?= csrf_field(); ?>

            <div class="mb-3">
                <label for="judul" class="form-label">Judul Artikel</label>
                <input type="text" class="form-control" id="judul" name="judul" 
                       value="<?= old('judul'); ?>" required>
            </div>

            <div class="mb-3">
                <label for="isi" class="form-label">Isi Artikel</label>
                <textarea class="form-control" id="isi" name="isi" rows="8" required><?= old('isi'); ?></textarea>
            </div>

            <div class="mb-3">
                <label for="id_kategori" class="form-label">Kategori</label>
                <select class="form-select" id="id_kategori" name="id_kategori" required>
                    <option value="">-- Pilih Kategori --</option>
                    <?php foreach ($kategori as $k): ?>
                        <option value="<?= $k['id_kategori']; ?>" <?= old('id_kategori') == $k['id_kategori'] ? 'selected' : ''; ?>>
                            <?= esc($k['nama_kategori']); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="gambar" class="form-label">Upload Gambar</label>
                <input type="file" class="form-control" id="gambar" name="gambar" accept="image/*" required>
                <div class="form-text">Format JPG, PNG, GIF. Ukuran maksimal 2MB.</div>
            </div>

            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <a href="<?= base_url('admin/artikel'); ?>" class="btn btn-secondary">Batal</a>
                <button type="submit" class="btn btn-primary">Simpan Artikel</button>
            </div>
        </form>
    </div>
</div>

<?= $this->include('template/admin_footer'); ?>
