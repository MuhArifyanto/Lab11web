<?= $this->include('template/public_header'); ?>

<!-- Hero Section -->
<div class="bg-primary text-white py-5">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h1 class="display-4 fw-bold mb-3">FAQ</h1>
                <p class="lead">Pertanyaan yang Sering Diajukan</p>
            </div>
        </div>
    </div>
</div>

<!-- Content Section -->
<div class="container py-5">
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="accordion" id="faqAccordion">
                
                <!-- FAQ 1 -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="faq1">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse1">
                            Apa itu Portal Berita?
                        </button>
                    </h2>
                    <div id="collapse1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            Portal Berita adalah platform digital yang menyajikan informasi terkini, akurat, dan terpercaya dari berbagai bidang seperti teknologi, olahraga, politik, ekonomi, dan hiburan.
                        </div>
                    </div>
                </div>

                <!-- FAQ 2 -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="faq2">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse2">
                            Apakah Portal Berita gratis?
                        </button>
                    </h2>
                    <div id="collapse2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            Ya, Portal Berita dapat diakses secara gratis oleh semua pengguna. Kami berkomitmen menyediakan informasi berkualitas tanpa biaya.
                        </div>
                    </div>
                </div>

                <!-- FAQ 3 -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="faq3">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse3">
                            Bagaimana cara mengakses artikel terbaru?
                        </button>
                    </h2>
                    <div id="collapse3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            Anda dapat mengakses artikel terbaru melalui halaman beranda atau mengklik menu "Artikel" di navigasi atas. Artikel terbaru akan ditampilkan di bagian atas halaman.
                        </div>
                    </div>
                </div>

                <!-- FAQ 4 -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="faq4">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse4">
                            Apakah Portal Berita tersedia di mobile?
                        </button>
                    </h2>
                    <div id="collapse4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            Ya, Portal Berita dirancang responsif dan dapat diakses dengan sempurna melalui smartphone, tablet, maupun desktop. Tampilan akan menyesuaikan dengan ukuran layar perangkat Anda.
                        </div>
                    </div>
                </div>

                <!-- FAQ 5 -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="faq5">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse5">
                            Bagaimana cara menghubungi redaksi?
                        </button>
                    </h2>
                    <div id="collapse5" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            Anda dapat menghubungi redaksi melalui halaman "Kontak" atau mengirim email ke info@portalberita.com. Tim kami akan merespons dalam 1x24 jam.
                        </div>
                    </div>
                </div>

                <!-- FAQ 6 -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="faq6">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse6">
                            Apakah saya bisa berkontribusi menulis artikel?
                        </button>
                    </h2>
                    <div id="collapse6" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            Saat ini, penulisan artikel dilakukan oleh tim redaksi internal. Namun, kami terbuka untuk saran topik atau masukan melalui halaman kontak.
                        </div>
                    </div>
                </div>

                <!-- FAQ 7 -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="faq7">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse7">
                            Bagaimana cara melaporkan konten yang tidak sesuai?
                        </button>
                    </h2>
                    <div id="collapse7" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            Jika Anda menemukan konten yang tidak sesuai, silakan hubungi kami melalui halaman kontak dengan menyertakan link artikel dan alasan pelaporan. Tim kami akan meninjau dalam waktu 24 jam.
                        </div>
                    </div>
                </div>

                <!-- FAQ 8 -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="faq8">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse8">
                            Seberapa sering artikel diperbarui?
                        </button>
                    </h2>
                    <div id="collapse8" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            Kami memperbarui artikel setiap hari dengan berita terkini. Tim redaksi bekerja 24/7 untuk memastikan informasi yang disajikan selalu up-to-date dan relevan.
                        </div>
                    </div>
                </div>

            </div>

            <!-- Contact Section -->
            <div class="card mt-5 shadow-sm">
                <div class="card-body p-4 text-center">
                    <h4 class="mb-3">Masih Ada Pertanyaan?</h4>
                    <p class="text-muted mb-4">Jika pertanyaan Anda belum terjawab, jangan ragu untuk menghubungi kami.</p>
                    <div class="d-flex justify-content-center gap-3">
                        <a href="<?= base_url('contact'); ?>" class="btn btn-primary">
                            <i class="bi bi-envelope me-2"></i>Hubungi Kami
                        </a>
                        <a href="<?= base_url('/'); ?>" class="btn btn-outline-primary">
                            <i class="bi bi-house me-2"></i>Kembali ke Beranda
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->include('template/public_footer'); ?>
