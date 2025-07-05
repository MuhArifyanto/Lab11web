<?= $this->include('template/public_header'); ?>

<!-- Hero Section -->
<div class="hero-section bg-gradient-primary text-white py-5 mb-5" style="background: linear-gradient(135deg, #28a745 0%, #20c997 100%);">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <h1 class="display-4 fw-bold mb-3">Hubungi Kami</h1>
                <p class="lead mb-4">Kami siap membantu Anda. Jangan ragu untuk menghubungi tim Portal Berita untuk pertanyaan, saran, atau kerjasama.</p>
            </div>
            <div class="col-lg-6 text-center">
                <i class="bi bi-envelope-heart" style="font-size: 8rem; opacity: 0.8;"></i>
            </div>
        </div>
    </div>
</div>

<!-- Contact Information -->
<div class="container">
    <div class="row mb-5">
        <div class="col-lg-4 mb-4">
            <div class="card h-100 shadow-sm border-0 text-center">
                <div class="card-body p-4">
                    <div class="bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                        <i class="bi bi-geo-alt" style="font-size: 2rem;"></i>
                    </div>
                    <h5 class="card-title">Alamat</h5>
                    <p class="card-text text-muted">
                        Portal Berita Indonesia<br>
                        Jl. Media Digital No. 123<br>
                        Jakarta Pusat 10110<br>
                        Indonesia
                    </p>
                </div>
            </div>
        </div>
        <div class="col-lg-4 mb-4">
            <div class="card h-100 shadow-sm border-0 text-center">
                <div class="card-body p-4">
                    <div class="bg-success text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                        <i class="bi bi-telephone" style="font-size: 2rem;"></i>
                    </div>
                    <h5 class="card-title">Telepon</h5>
                    <p class="card-text text-muted">
                        <strong>Redaksi:</strong><br>
                        +62 21 5555 6666<br><br>
                        <strong>Administrasi:</strong><br>
                        +62 21 7777 8888
                    </p>
                </div>
            </div>
        </div>
        <div class="col-lg-4 mb-4">
            <div class="card h-100 shadow-sm border-0 text-center">
                <div class="card-body p-4">
                    <div class="bg-info text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                        <i class="bi bi-envelope" style="font-size: 2rem;"></i>
                    </div>
                    <h5 class="card-title">Email</h5>
                    <p class="card-text text-muted">
                        <strong>Redaksi:</strong><br>
                        redaksi@portalberita.id<br><br>
                        <strong>Info Umum:</strong><br>
                        info@portalberita.id
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Contact Form -->
    <div class="row mb-5">
        <div class="col-lg-8 mx-auto">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-primary text-white text-center">
                    <h3 class="mb-0"><i class="bi bi-chat-dots me-2"></i>Kirim Pesan</h3>
                </div>
                <div class="card-body p-4">
                    <form>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="nama" class="form-label">Nama Lengkap</label>
                                <input type="text" class="form-control" id="nama" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="telepon" class="form-label">Nomor Telepon</label>
                                <input type="tel" class="form-control" id="telepon">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="subjek" class="form-label">Subjek</label>
                                <select class="form-select" id="subjek" required>
                                    <option value="">Pilih Subjek</option>
                                    <option value="umum">Pertanyaan Umum</option>
                                    <option value="redaksi">Redaksi</option>
                                    <option value="kerjasama">Kerjasama</option>
                                    <option value="teknis">Masalah Teknis</option>
                                    <option value="lainnya">Lainnya</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="pesan" class="form-label">Pesan</label>
                            <textarea class="form-control" id="pesan" rows="5" required placeholder="Tulis pesan Anda di sini..."></textarea>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary btn-lg">
                                <i class="bi bi-send me-2"></i>Kirim Pesan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Social Media -->
    <div class="row mb-5">
        <div class="col-12">
            <div class="card bg-light border-0">
                <div class="card-body p-5 text-center">
                    <h3 class="fw-bold mb-4">Ikuti Kami</h3>
                    <p class="text-muted mb-4">Tetap terhubung dengan Portal Berita melalui media sosial</p>
                    <div class="d-flex justify-content-center gap-3">
                        <a href="#" class="btn btn-outline-primary btn-lg">
                            <i class="bi bi-facebook"></i>
                        </a>
                        <a href="#" class="btn btn-outline-info btn-lg">
                            <i class="bi bi-twitter"></i>
                        </a>
                        <a href="#" class="btn btn-outline-danger btn-lg">
                            <i class="bi bi-instagram"></i>
                        </a>
                        <a href="#" class="btn btn-outline-dark btn-lg">
                            <i class="bi bi-linkedin"></i>
                        </a>
                        <a href="#" class="btn btn-outline-success btn-lg">
                            <i class="bi bi-whatsapp"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Office Hours -->
    <div class="row mb-5">
        <div class="col-lg-6 mx-auto">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-warning text-dark text-center">
                    <h4 class="mb-0"><i class="bi bi-clock me-2"></i>Jam Operasional</h4>
                </div>
                <div class="card-body">
                    <div class="row text-center">
                        <div class="col-6">
                            <h6 class="fw-bold">Senin - Jumat</h6>
                            <p class="text-muted mb-0">08:00 - 17:00 WIB</p>
                        </div>
                        <div class="col-6">
                            <h6 class="fw-bold">Sabtu - Minggu</h6>
                            <p class="text-muted mb-0">Tutup</p>
                        </div>
                    </div>
                    <hr>
                    <div class="text-center">
                        <small class="text-muted">
                            <i class="bi bi-info-circle me-1"></i>
                            Untuk pertanyaan mendesak di luar jam operasional, silakan kirim email
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->include('template/public_footer'); ?>
