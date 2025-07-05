    <!-- Footer -->
    <footer class="bg-dark text-white py-5 mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-4">
                    <h5><i class="bi bi-newspaper me-2"></i>Portal Berita</h5>
                    <p class="mb-3">Platform berita digital terpercaya yang menyajikan informasi terkini dari berbagai bidang.</p>
                    <div class="d-flex gap-2">
                        <a href="#" class="btn btn-outline-light btn-sm">
                            <i class="bi bi-facebook"></i>
                        </a>
                        <a href="#" class="btn btn-outline-light btn-sm">
                            <i class="bi bi-twitter"></i>
                        </a>
                        <a href="#" class="btn btn-outline-light btn-sm">
                            <i class="bi bi-instagram"></i>
                        </a>
                        <a href="#" class="btn btn-outline-light btn-sm">
                            <i class="bi bi-linkedin"></i>
                        </a>
                    </div>
                </div>
                <div class="col-md-2 mb-4">
                    <h6>Menu</h6>
                    <ul class="list-unstyled">
                        <li><a href="<?= base_url('/'); ?>" class="text-white-50 text-decoration-none">Home</a></li>
                        <li><a href="<?= base_url('artikel'); ?>" class="text-white-50 text-decoration-none">Artikel</a></li>
                        <li><a href="<?= base_url('about'); ?>" class="text-white-50 text-decoration-none">About</a></li>
                        <li><a href="<?= base_url('contact'); ?>" class="text-white-50 text-decoration-none">Contact</a></li>
                    </ul>
                </div>
                <div class="col-md-3 mb-4">
                    <h6>Kategori</h6>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-white-50 text-decoration-none">Teknologi</a></li>
                        <li><a href="#" class="text-white-50 text-decoration-none">Olahraga</a></li>
                        <li><a href="#" class="text-white-50 text-decoration-none">Politik</a></li>
                        <li><a href="#" class="text-white-50 text-decoration-none">Ekonomi</a></li>
                        <li><a href="#" class="text-white-50 text-decoration-none">Hiburan</a></li>
                    </ul>
                </div>
                <div class="col-md-3 mb-4">
                    <h6>Bantuan</h6>
                    <ul class="list-unstyled">
                        <li><a href="<?= base_url('faqs'); ?>" class="text-white-50 text-decoration-none">FAQ</a></li>
                        <li><a href="<?= base_url('contact'); ?>" class="text-white-50 text-decoration-none">Hubungi Kami</a></li>
                        <?php if (!session()->get('logged_in')): ?>
                            <li><a href="<?= base_url('user/login'); ?>" class="text-white-50 text-decoration-none">Login Admin</a></li>
                        <?php else: ?>
                            <li><a href="<?= base_url('admin/artikel'); ?>" class="text-white-50 text-decoration-none">Dashboard</a></li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
            <hr class="my-4">
            <div class="row">
                <div class="col-md-6">
                    <p class="mb-0">&copy; 2025 Portal Berita. All rights reserved.</p>
                </div>
                <div class="col-md-6 text-md-end">
                    <p class="mb-0"><small>Powered by CodeIgniter 4</small></p>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
