<?= $this->include('template/public_header'); ?>

<!-- Hero Section -->
<div class="hero-section bg-primary text-white py-5 mb-5 position-relative overflow-hidden">
    <!-- Animated Background -->
    <div class="hero-bg-animation"></div>
    <div class="floating-shapes">
        <div class="shape shape-1"></div>
        <div class="shape shape-2"></div>
        <div class="shape shape-3"></div>
        <div class="shape shape-4"></div>
    </div>

    <div class="container position-relative">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="hero-content">
                    <h1 class="display-4 fw-bold mb-3 animate-slide-up">Portal Berita</h1>
                    <h2 class="h3 mb-4 animate-slide-up" style="animation-delay: 0.2s;">Terkini & Terpercaya</h2>
                    <p class="lead mb-4 animate-slide-up" style="animation-delay: 0.4s;">Dapatkan informasi terkini seputar dunia teknologi, olahraga, politik, ekonomi, dan hiburan. Tetap update dengan berita terpercaya dari berbagai sumber terbaik.</p>
                    <div class="d-flex gap-3 animate-slide-up" style="animation-delay: 0.6s;">
                        <a href="<?= base_url('artikel'); ?>" class="btn btn-light btn-lg btn-animated">
                            <i class="bi bi-file-text me-2"></i>Baca Artikel
                        </a>
                        <?php if (!session()->get('logged_in')): ?>
                            <a href="<?= base_url('user/login'); ?>" class="btn btn-outline-light btn-lg btn-animated">
                                <i class="bi bi-box-arrow-in-right me-2"></i>Login Admin
                            </a>
                        <?php else: ?>
                            <a href="<?= base_url('admin/artikel'); ?>" class="btn btn-outline-light btn-lg btn-animated">
                                <i class="bi bi-speedometer2 me-2"></i>Dashboard
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 text-center">
                <div class="hero-icon-container">
                    <div class="icon-bg-circle"></div>
                    <i class="bi bi-newspaper display-1 hero-icon animate-float"></i>
                    <div class="pulse-ring"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Artikel Terbaru Section -->
<div class="container">
    <div class="row mb-4">
        <div class="col-12 text-center">
            <div class="section-header animate-fade-in">
                <span class="badge bg-primary mb-3 px-3 py-2 rounded-pill">
                    <i class="bi bi-lightning-charge me-1"></i>Terbaru
                </span>
                <h2 class="fw-bold mb-4 animate-slide-up">
                    <i class="bi bi-clock me-2 text-primary"></i>Artikel Terkini
                </h2>
                <p class="text-muted animate-slide-up" style="animation-delay: 0.2s;">
                    Baca berita terbaru dan terpercaya dari berbagai kategori
                </p>
            </div>
        </div>
    </div>

    <?php if (!empty($artikel)): ?>
        <div class="row">
            <?php foreach ($artikel as $index => $item): ?>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card h-100 shadow-sm article-card animate-scale-in" style="animation-delay: <?= $index * 0.1; ?>s;">
                        <?php if (!empty($item['gambar'])): ?>
                            <img src="<?= base_url('gambar/' . $item['gambar']); ?>" 
                                 class="card-img-top" 
                                 alt="<?= htmlspecialchars($item['judul']); ?>"
                                 style="height: 200px; object-fit: cover;">
                        <?php else: ?>
                            <div class="card-img-top bg-light d-flex align-items-center justify-content-center" style="height: 200px;">
                                <i class="bi bi-image text-muted" style="font-size: 3rem;"></i>
                            </div>
                        <?php endif; ?>
                        
                        <div class="card-body d-flex flex-column">
                            <?php if (!empty($item['nama_kategori'])): ?>
                                <span class="badge bg-primary mb-2 align-self-start"><?= htmlspecialchars($item['nama_kategori']); ?></span>
                            <?php endif; ?>
                            
                            <h5 class="card-title"><?= htmlspecialchars($item['judul']); ?></h5>
                            <p class="card-text flex-grow-1"><?= htmlspecialchars(substr($item['isi'], 0, 120)); ?>...</p>
                            
                            <div class="mt-auto">
                                <a href="<?= base_url('artikel/' . ($item['slug'] ?? 'artikel-' . $item['id'])); ?>" class="btn btn-primary">
                                    <i class="bi bi-arrow-right me-1"></i>Baca Selengkapnya
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- Tombol Lihat Semua Artikel -->
        <div class="row mt-4">
            <div class="col-12 text-center">
                <a href="<?= base_url('artikel'); ?>" class="btn btn-outline-primary btn-lg">
                    <i class="bi bi-grid me-2"></i>Lihat Semua Artikel
                </a>
            </div>
        </div>
    <?php else: ?>
        <!-- Jika tidak ada artikel -->
        <div class="row">
            <div class="col-12 text-center py-5">
                <i class="bi bi-file-text text-muted" style="font-size: 4rem;"></i>
                <h3 class="text-muted mt-3">Belum Ada Artikel</h3>
                <p class="text-muted">Artikel akan segera hadir. Silakan kembali lagi nanti.</p>
                <?php if (session()->get('logged_in')): ?>
                    <a href="<?= base_url('admin/artikel/add'); ?>" class="btn btn-primary">
                        <i class="bi bi-plus-circle me-2"></i>Tambah Artikel Pertama
                    </a>
                <?php endif; ?>
            </div>
        </div>
    <?php endif; ?>
</div>

<!-- Features Section -->
<div class="bg-light py-5 mt-5 position-relative overflow-hidden">
    <div class="features-bg-pattern"></div>
    <div class="container position-relative">
        <div class="row mb-5">
            <div class="col-12 text-center">
                <div class="section-header animate-fade-in">
                    <span class="badge bg-success mb-3 px-3 py-2 rounded-pill">
                        <i class="bi bi-star me-1"></i>Keunggulan
                    </span>
                    <h2 class="fw-bold mb-4 animate-slide-up">Mengapa Memilih Portal Berita?</h2>
                    <p class="text-muted animate-slide-up" style="animation-delay: 0.2s;">
                        Platform berita terdepan dengan berbagai keunggulan
                    </p>
                </div>
            </div>
        </div>
        <div class="row text-center">
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="feature-box animate-bounce-in" style="animation-delay: 0.1s;">
                    <div class="feature-icon-wrapper">
                        <i class="bi bi-lightning-charge text-primary feature-icon"></i>
                        <div class="icon-bg-circle"></div>
                    </div>
                    <h4 class="mt-3">Berita Terkini</h4>
                    <p class="text-muted">Update berita terbaru setiap hari</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="feature-box animate-bounce-in" style="animation-delay: 0.2s;">
                    <div class="feature-icon-wrapper">
                        <i class="bi bi-shield-check text-primary feature-icon"></i>
                        <div class="icon-bg-circle"></div>
                    </div>
                    <h4 class="mt-3">Terpercaya</h4>
                    <p class="text-muted">Sumber berita yang dapat dipercaya</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="feature-box animate-bounce-in" style="animation-delay: 0.3s;">
                    <div class="feature-icon-wrapper">
                        <i class="bi bi-globe text-primary feature-icon"></i>
                        <div class="icon-bg-circle"></div>
                    </div>
                    <h4 class="mt-3">Beragam Kategori</h4>
                    <p class="text-muted">Teknologi, olahraga, politik, dan lainnya</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="feature-box animate-bounce-in" style="animation-delay: 0.4s;">
                    <div class="feature-icon-wrapper">
                        <i class="bi bi-phone text-primary feature-icon"></i>
                        <div class="icon-bg-circle"></div>
                    </div>
                    <h4 class="mt-3">Mobile Friendly</h4>
                    <p class="text-muted">Akses mudah dari perangkat apapun</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Custom CSS for Animations -->
<style>
/* Animation Keyframes */
@keyframes slideUp {
    from {
        opacity: 0;
        transform: translateY(50px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes fadeIn {
    from {
        opacity: 0;
    }
    to {
        opacity: 1;
    }
}

@keyframes scaleIn {
    from {
        opacity: 0;
        transform: scale(0.8);
    }
    to {
        opacity: 1;
        transform: scale(1);
    }
}

@keyframes bounceIn {
    0% {
        opacity: 0;
        transform: scale(0.3) translateY(50px);
    }
    50% {
        opacity: 1;
        transform: scale(1.05) translateY(-10px);
    }
    70% {
        transform: scale(0.95) translateY(0);
    }
    100% {
        opacity: 1;
        transform: scale(1) translateY(0);
    }
}

@keyframes float {
    0%, 100% {
        transform: translateY(0px);
    }
    50% {
        transform: translateY(-20px);
    }
}

@keyframes pulse {
    0% {
        transform: scale(1);
        opacity: 1;
    }
    50% {
        transform: scale(1.1);
        opacity: 0.7;
    }
    100% {
        transform: scale(1);
        opacity: 1;
    }
}

@keyframes rotate {
    from {
        transform: rotate(0deg);
    }
    to {
        transform: rotate(360deg);
    }
}

@keyframes slideInLeft {
    from {
        opacity: 0;
        transform: translateX(-100px);
    }
    to {
        opacity: 1;
        transform: translateX(0);
    }
}

@keyframes slideInRight {
    from {
        opacity: 0;
        transform: translateX(100px);
    }
    to {
        opacity: 1;
        transform: translateX(0);
    }
}

/* Animation Classes */
.animate-slide-up {
    animation: slideUp 0.8s ease-out forwards;
    opacity: 0;
}

.animate-fade-in {
    animation: fadeIn 1s ease-out forwards;
    opacity: 0;
}

.animate-scale-in {
    animation: scaleIn 0.6s ease-out forwards;
    opacity: 0;
}

.animate-bounce-in {
    animation: bounceIn 0.8s ease-out forwards;
    opacity: 0;
}

.animate-float {
    animation: float 3s ease-in-out infinite;
}

/* Hero Section Animations */
.hero-section {
    background: linear-gradient(135deg, #0d6efd 0%, #6610f2 100%);
}

.hero-bg-animation {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grid" width="10" height="10" patternUnits="userSpaceOnUse"><path d="M 10 0 L 0 0 0 10" fill="none" stroke="white" stroke-opacity="0.1" stroke-width="1"/></pattern></defs><rect width="100" height="100" fill="url(%23grid)"/></svg>');
    animation: slideInLeft 1s ease-out;
}

.floating-shapes {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    overflow: hidden;
    pointer-events: none;
}

.shape {
    position: absolute;
    background: rgba(255, 255, 255, 0.1);
    border-radius: 50%;
}

.shape-1 {
    width: 100px;
    height: 100px;
    top: 20%;
    left: 10%;
    animation: float 6s ease-in-out infinite;
}

.shape-2 {
    width: 60px;
    height: 60px;
    top: 60%;
    right: 20%;
    animation: float 4s ease-in-out infinite reverse;
}

.shape-3 {
    width: 80px;
    height: 80px;
    bottom: 30%;
    left: 70%;
    animation: float 5s ease-in-out infinite;
    animation-delay: 1s;
}

.shape-4 {
    width: 40px;
    height: 40px;
    top: 40%;
    right: 10%;
    animation: float 3s ease-in-out infinite;
    animation-delay: 2s;
}

.hero-icon-container {
    position: relative;
    display: inline-block;
}

.hero-icon {
    position: relative;
    z-index: 2;
    color: rgba(255, 255, 255, 0.9);
}

.icon-bg-circle {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 200px;
    height: 200px;
    background: rgba(255, 255, 255, 0.1);
    border-radius: 50%;
    z-index: 1;
    animation: pulse 2s ease-in-out infinite;
}

.pulse-ring {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 250px;
    height: 250px;
    border: 2px solid rgba(255, 255, 255, 0.3);
    border-radius: 50%;
    animation: pulse 3s ease-in-out infinite;
    animation-delay: 0.5s;
}

/* Button Animations */
.btn-animated {
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
}

.btn-animated::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
    transition: left 0.5s;
}

.btn-animated:hover::before {
    left: 100%;
}

.btn-animated:hover {
    transform: translateY(-3px);
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
}

/* Article Card Animations */
.article-card {
    transition: all 0.3s ease;
    border: none;
    border-radius: 15px;
    overflow: hidden;
}

.article-card:hover {
    transform: translateY(-10px) scale(1.02);
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15) !important;
}

.article-card .card-img-top {
    transition: transform 0.3s ease;
}

.article-card:hover .card-img-top {
    transform: scale(1.1);
}

/* Feature Box Animations */
.feature-box {
    transition: all 0.3s ease;
    padding: 2rem 1rem;
    border-radius: 15px;
    background: white;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
    position: relative;
    overflow: hidden;
}

.feature-box::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(135deg, rgba(13, 110, 253, 0.1), rgba(102, 16, 242, 0.1));
    opacity: 0;
    transition: opacity 0.3s ease;
}

.feature-box:hover::before {
    opacity: 1;
}

.feature-box:hover {
    transform: translateY(-15px);
    box-shadow: 0 25px 50px rgba(0, 0, 0, 0.15);
}

.feature-icon-wrapper {
    position: relative;
    display: inline-block;
    margin-bottom: 1rem;
}

.feature-icon {
    font-size: 3rem;
    position: relative;
    z-index: 2;
    transition: all 0.3s ease;
}

.feature-box:hover .feature-icon {
    transform: scale(1.1) rotate(5deg);
    color: #0d6efd !important;
}

.feature-icon-wrapper .icon-bg-circle {
    width: 80px;
    height: 80px;
    background: rgba(13, 110, 253, 0.1);
    animation: pulse 2s ease-in-out infinite;
}

/* Features Background Pattern */
.features-bg-pattern {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="dots" width="20" height="20" patternUnits="userSpaceOnUse"><circle cx="10" cy="10" r="1" fill="%23000" opacity="0.05"/></pattern></defs><rect width="100" height="100" fill="url(%23dots)"/></svg>');
}

/* Responsive Animations */
@media (max-width: 768px) {
    .shape {
        display: none;
    }

    .hero-icon-container .icon-bg-circle {
        width: 150px;
        height: 150px;
    }

    .pulse-ring {
        width: 180px;
        height: 180px;
    }

    .feature-box {
        margin-bottom: 2rem;
    }
}

/* Scroll-triggered animations */
.scroll-animate {
    opacity: 0;
    transform: translateY(50px);
    transition: all 0.6s ease;
}

.scroll-animate.animate {
    opacity: 1;
    transform: translateY(0);
}
</style>

<!-- JavaScript for Scroll Animations -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Intersection Observer for scroll animations
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver(function(entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate');
            }
        });
    }, observerOptions);

    // Observe elements for scroll animation
    document.querySelectorAll('.scroll-animate').forEach(el => {
        observer.observe(el);
    });

    // Add scroll animation class to elements
    document.querySelectorAll('.feature-box, .article-card').forEach((el, index) => {
        el.classList.add('scroll-animate');
        el.style.transitionDelay = (index * 0.1) + 's';
    });

    // Smooth scroll for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });

    // Add loading animation to page
    document.body.style.opacity = '0';
    document.body.style.transition = 'opacity 0.5s ease';

    window.addEventListener('load', function() {
        document.body.style.opacity = '1';
    });

    // Parallax effect for hero section
    window.addEventListener('scroll', function() {
        const scrolled = window.pageYOffset;
        const heroSection = document.querySelector('.hero-section');
        if (heroSection) {
            const rate = scrolled * -0.5;
            heroSection.style.transform = `translateY(${rate}px)`;
        }
    });
});
</script>

<?= $this->include('template/public_footer'); ?>
