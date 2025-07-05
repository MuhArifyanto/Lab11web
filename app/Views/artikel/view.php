<?= $this->include('template/public_header'); ?>

<!-- Hero Section -->
<div class="bg-primary text-white py-4 mb-4">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- Breadcrumb -->
                <nav aria-label="breadcrumb" class="mb-2">
                    <ol class="breadcrumb bg-transparent mb-0">
                        <li class="breadcrumb-item">
                            <a href="<?= base_url('/'); ?>" class="text-white-50 text-decoration-none">
                                <i class="bi bi-house me-1"></i>Home
                            </a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="<?= base_url('/artikel'); ?>" class="text-white-50 text-decoration-none">Artikel</a>
                        </li>
                        <li class="breadcrumb-item active text-white" aria-current="page">
                            <?= esc(substr($artikel['judul'], 0, 50)); ?><?= strlen($artikel['judul']) > 50 ? '...' : ''; ?>
                        </li>
                    </ol>
                </nav>

                <!-- Category Badge -->
                <?php if (!empty($artikel['nama_kategori'])): ?>
                    <span class="badge bg-light text-primary mb-2">
                        <i class="bi bi-tag me-1"></i><?= esc($artikel['nama_kategori']); ?>
                    </span>
                <?php endif; ?>

                <!-- Article Title -->
                <h1 class="display-5 fw-bold mb-0"><?= esc($artikel['judul']); ?></h1>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <!-- Article Content -->
            <article class="card border-0 shadow-sm">
                <!-- Article Image -->
                <?php if (!empty($artikel['gambar'])): ?>
                    <div class="position-relative">
                        <img src="<?= base_url('gambar/' . $artikel['gambar']); ?>"
                             alt="<?= esc($artikel['judul']); ?>"
                             class="card-img-top"
                             style="height: 400px; object-fit: cover;">
                        <div class="position-absolute bottom-0 start-0 end-0 bg-gradient-dark p-3">
                            <div class="text-white">
                                <small>
                                    <i class="bi bi-calendar3 me-1"></i>
                                    <?= date('d F Y', strtotime($artikel['created_at'] ?? 'now')); ?>
                                    <span class="mx-2">•</span>
                                    <i class="bi bi-eye me-1"></i>
                                    <?= rand(100, 999); ?> views
                                </small>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>

                <div class="card-body p-4">
                    <!-- Meta Information (if no image) -->
                    <?php if (empty($artikel['gambar'])): ?>
                        <div class="border-bottom pb-3 mb-4">
                            <div class="text-muted">
                                <small>
                                    <i class="bi bi-calendar3 me-1"></i>
                                    <?= date('d F Y', strtotime($artikel['created_at'] ?? 'now')); ?>
                                    <span class="mx-2">•</span>
                                    <i class="bi bi-eye me-1"></i>
                                    <?= rand(100, 999); ?> views
                                    <span class="mx-2">•</span>
                                    <i class="bi bi-clock me-1"></i>
                                    <?= ceil(str_word_count($artikel['isi']) / 200); ?> min read
                                </small>
                            </div>
                        </div>
                    <?php endif; ?>

                    <!-- Article Content -->
                    <div class="article-content">
                        <?= nl2br(esc($artikel['isi'])); ?>
                    </div>

                    <!-- Article Footer -->
                    <div class="border-top pt-4 mt-4">
                        <div class="row align-items-center">
                            <div class="col-md-6">
                                <div class="d-flex align-items-center">
                                    <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 50px; height: 50px;">
                                        <i class="bi bi-person-fill"></i>
                                    </div>
                                    <div>
                                        <h6 class="mb-0">Admin Portal</h6>
                                        <small class="text-muted">Editor</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 text-md-end mt-3 mt-md-0">
                                <div class="btn-group" role="group">
                                    <button type="button" class="btn btn-outline-primary btn-sm">
                                        <i class="bi bi-heart me-1"></i>Like
                                    </button>
                                    <button type="button" class="btn btn-outline-primary btn-sm">
                                        <i class="bi bi-share me-1"></i>Share
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </article>

            <!-- Navigation & Related Articles -->
            <div class="row mt-5">
                <div class="col-12">
                    <!-- Back Button -->
                    <div class="text-center mb-4">
                        <a href="<?= base_url('/artikel'); ?>" class="btn btn-primary btn-lg">
                            <i class="bi bi-arrow-left me-2"></i>Kembali ke Daftar Artikel
                        </a>
                        <a href="<?= base_url('/'); ?>" class="btn btn-outline-primary btn-lg ms-2">
                            <i class="bi bi-house me-2"></i>Ke Beranda
                        </a>
                    </div>
                </div>
            </div>

            <!-- Related Articles Section -->
            <div class="row mt-4">
                <div class="col-12">
                    <div class="card bg-light border-0">
                        <div class="card-body p-4">
                            <h4 class="card-title mb-4">
                                <i class="bi bi-newspaper me-2 text-primary"></i>Artikel Lainnya
                            </h4>
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <div class="card h-100 border-0 shadow-sm">
                                        <div class="card-body">
                                            <h6 class="card-title">
                                                <a href="<?= base_url('/artikel'); ?>" class="text-decoration-none">
                                                    Jelajahi Semua Artikel
                                                </a>
                                            </h6>
                                            <p class="card-text text-muted small">
                                                Temukan artikel menarik lainnya di portal berita kami.
                                            </p>
                                            <a href="<?= base_url('/artikel'); ?>" class="btn btn-sm btn-outline-primary">
                                                Lihat Semua <i class="bi bi-arrow-right ms-1"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <div class="card h-100 border-0 shadow-sm">
                                        <div class="card-body">
                                            <h6 class="card-title">
                                                <a href="<?= base_url('/'); ?>" class="text-decoration-none">
                                                    Artikel Terbaru
                                                </a>
                                            </h6>
                                            <p class="card-text text-muted small">
                                                Baca artikel terbaru dan terkini di beranda.
                                            </p>
                                            <a href="<?= base_url('/'); ?>" class="btn btn-sm btn-outline-primary">
                                                Ke Beranda <i class="bi bi-arrow-right ms-1"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <div class="card h-100 border-0 shadow-sm">
                                        <div class="card-body">
                                            <h6 class="card-title">
                                                <a href="<?= base_url('/about'); ?>" class="text-decoration-none">
                                                    Tentang Kami
                                                </a>
                                            </h6>
                                            <p class="card-text text-muted small">
                                                Pelajari lebih lanjut tentang Portal Berita.
                                            </p>
                                            <a href="<?= base_url('/about'); ?>" class="btn btn-sm btn-outline-primary">
                                                Selengkapnya <i class="bi bi-arrow-right ms-1"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.article-content {
    font-size: 1.1rem;
    line-height: 1.8;
    text-align: justify;
}

.article-content p {
    margin-bottom: 1.5rem;
}

.bg-gradient-dark {
    background: linear-gradient(to top, rgba(0,0,0,0.8), transparent);
}

.breadcrumb-item + .breadcrumb-item::before {
    content: "›";
    color: rgba(255,255,255,0.5);
}

.breadcrumb-item.active {
    color: white !important;
}

.card-img-top {
    transition: transform 0.3s ease;
}

.card:hover .card-img-top {
    transform: scale(1.02);
}

.btn-group .btn {
    transition: all 0.3s ease;
}

.btn-group .btn:hover {
    transform: translateY(-2px);
}

@media (max-width: 768px) {
    .display-5 {
        font-size: 1.8rem;
    }

    .article-content {
        font-size: 1rem;
        line-height: 1.6;
    }

    .card-img-top {
        height: 250px !important;
    }

    .btn-lg {
        font-size: 0.9rem;
        padding: 0.5rem 1rem;
    }
}
</style>

<?= $this->include('template/public_footer'); ?>
