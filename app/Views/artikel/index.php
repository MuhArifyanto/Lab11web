<?= $this->include('template/public_header'); ?>

<!-- Hero Section -->
<section class="hero-section position-relative overflow-hidden">
    <!-- Animated Background -->
    <div class="hero-bg-animation"></div>
    <div class="floating-elements">
        <div class="floating-shape shape-1"></div>
        <div class="floating-shape shape-2"></div>
        <div class="floating-shape shape-3"></div>
        <div class="floating-shape shape-4"></div>
        <div class="floating-shape shape-5"></div>
    </div>

    <!-- Particles Background -->
    <div class="particles-container">
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
    </div>

    <div class="hero-overlay position-relative">
        <div class="container">
            <div class="row align-items-center min-vh-50">
                <div class="col-lg-8 mx-auto text-center text-white">
                    <div class="hero-content">
                        <span class="badge bg-light text-primary mb-3 px-3 py-2 rounded-pill animate-bounce-in">
                            <i class="bi bi-lightning-charge me-1"></i>Terkini
                        </span>
                        <h1 class="display-4 fw-bold mb-4 animate-slide-up">Portal Berita Terkini</h1>
                        <p class="lead mb-4 animate-slide-up" style="animation-delay: 0.2s;">
                            Dapatkan informasi terbaru dan terpercaya dari berbagai kategori berita
                        </p>
                        <div class="animate-slide-up" style="animation-delay: 0.4s;">
                            <a href="#articles" class="btn btn-light btn-lg px-4 py-2 rounded-pill btn-animated me-3">
                                <i class="bi bi-newspaper me-2"></i>Baca Artikel
                            </a>
                            <a href="<?= base_url('/'); ?>" class="btn btn-outline-light btn-lg px-4 py-2 rounded-pill btn-animated">
                                <i class="bi bi-house me-2"></i>Beranda
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Articles Section -->
<section id="articles" class="py-5 bg-light position-relative">
    <!-- Section Background Pattern -->
    <div class="section-bg-pattern"></div>

    <div class="container position-relative">
        <!-- Section Header -->
        <div class="row mb-5">
            <div class="col-12 text-center">
                <div class="section-header animate-fade-in">
                    <span class="badge bg-primary mb-3 px-3 py-2 rounded-pill animate-bounce-in">
                        <i class="bi bi-collection me-1"></i>Koleksi
                    </span>
                    <h2 class="display-5 fw-bold text-dark mb-3 animate-slide-up">Artikel Terbaru</h2>
                    <div class="divider mx-auto mb-4 animate-scale-in"></div>
                    <p class="lead text-muted animate-slide-up" style="animation-delay: 0.2s;">
                        Temukan berita dan artikel menarik pilihan redaksi
                    </p>
                </div>
            </div>
        </div>

        <?php if($artikel): ?>
            <!-- Featured Article (First Article) -->
            <?php $featured = array_shift($artikel); ?>
            <?php if($featured): ?>
                <div class="row mb-5">
                    <div class="col-12">
                        <div class="card featured-card shadow-lg border-0 overflow-hidden animate-scale-in" style="animation-delay: 0.3s;">
                            <div class="row g-0">
                                <div class="col-lg-6">
                                    <?php if(!empty($featured['gambar'])): ?>
                                        <img src="<?= base_url('/gambar/' . $featured['gambar']); ?>"
                                             class="img-fluid h-100 w-100"
                                             alt="<?= esc($featured['judul']); ?>"
                                             style="object-fit: cover; min-height: 300px;">
                                    <?php else: ?>
                                        <div class="bg-gradient-primary h-100 d-flex align-items-center justify-content-center">
                                            <i class="fas fa-newspaper fa-5x text-white opacity-50"></i>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class="col-lg-6">
                                    <div class="card-body h-100 d-flex flex-column p-4">
                                        <div class="mb-3">
                                            <span class="badge bg-primary px-3 py-2 rounded-pill">
                                                <i class="fas fa-star me-1"></i>Featured
                                            </span>
                                        </div>
                                        <h3 class="card-title fw-bold mb-3">
                                            <a href="<?= base_url('/artikel/' . $featured['slug']); ?>"
                                               class="text-decoration-none text-dark hover-primary">
                                                <?= esc($featured['judul']); ?>
                                            </a>
                                        </h3>
                                        <p class="card-text text-muted mb-4 flex-grow-1">
                                            <?= esc(substr($featured['isi'], 0, 200)); ?>...
                                        </p>
                                        <div class="mt-auto">
                                            <a href="<?= base_url('/artikel/' . $featured['slug']); ?>"
                                               class="btn btn-primary btn-lg rounded-pill px-4">
                                                <i class="fas fa-arrow-right me-2"></i>Baca Artikel
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <!-- Other Articles Grid -->
            <?php if(!empty($artikel)): ?>
                <div class="row">
                    <?php foreach($artikel as $index => $row): ?>
                        <div class="col-lg-4 col-md-6 mb-4">
                            <article class="card article-card h-100 shadow-sm border-0 overflow-hidden animate-slide-up-stagger" style="animation-delay: <?= 0.5 + ($index * 0.1); ?>s;">
                                <div class="card-img-wrapper">
                                    <?php if(!empty($row['gambar'])): ?>
                                        <img src="<?= base_url('/gambar/' . $row['gambar']); ?>"
                                             class="card-img-top"
                                             alt="<?= esc($row['judul']); ?>">
                                    <?php else: ?>
                                        <div class="card-img-placeholder">
                                            <i class="fas fa-image fa-3x text-muted"></i>
                                        </div>
                                    <?php endif; ?>
                                    <div class="card-img-overlay-gradient"></div>
                                </div>

                                <div class="card-body d-flex flex-column p-4">
                                    <h5 class="card-title fw-bold mb-3">
                                        <a href="<?= base_url('/artikel/' . $row['slug']); ?>"
                                           class="text-decoration-none text-dark hover-primary">
                                            <?= esc($row['judul']); ?>
                                        </a>
                                    </h5>

                                    <p class="card-text text-muted mb-4 flex-grow-1">
                                        <?= esc(substr($row['isi'], 0, 120)); ?>...
                                    </p>

                                    <div class="mt-auto d-flex justify-content-between align-items-center">
                                        <a href="<?= base_url('/artikel/' . $row['slug']); ?>"
                                           class="btn btn-outline-primary rounded-pill px-3">
                                            Baca Selengkapnya
                                        </a>
                                        <small class="text-muted">
                                            <i class="fas fa-clock me-1"></i>
                                            <?= date('d M Y', strtotime($row['created_at'] ?? 'now')); ?>
                                        </small>
                                    </div>
                                </div>
                            </article>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

        <?php else: ?>
            <!-- Empty State -->
            <div class="row">
                <div class="col-12">
                    <div class="text-center py-5">
                        <div class="empty-state">
                            <i class="fas fa-newspaper fa-5x text-muted mb-4"></i>
                            <h3 class="text-muted mb-3">Belum Ada Artikel</h3>
                            <p class="text-muted mb-4">Artikel sedang dalam proses penulisan. Silakan kembali lagi nanti.</p>
                            <a href="<?= base_url('/'); ?>" class="btn btn-primary rounded-pill px-4">
                                <i class="fas fa-refresh me-2"></i>Refresh Halaman
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>

<!-- Custom Styles -->
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

@keyframes particleFloat {
    0%, 100% {
        transform: translateY(0px) translateX(0px);
    }
    25% {
        transform: translateY(-20px) translateX(10px);
    }
    50% {
        transform: translateY(-40px) translateX(-5px);
    }
    75% {
        transform: translateY(-20px) translateX(-10px);
    }
}

/* Animation Classes */
.animate-slide-up {
    animation: slideUp 0.8s ease-out forwards;
    opacity: 0;
}

.animate-slide-up-stagger {
    animation: slideUp 0.6s ease-out forwards;
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

/* Hero Section */
.hero-section {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    min-height: 60vh;
    position: relative;
    overflow: hidden;
}

.hero-bg-animation {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grid" width="10" height="10" patternUnits="userSpaceOnUse"><path d="M 10 0 L 0 0 0 10" fill="none" stroke="white" stroke-opacity="0.1" stroke-width="1"/></pattern></defs><rect width="100" height="100" fill="url(%23grid)"/></svg>');
    animation: slideUp 1s ease-out;
}

.floating-elements {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    overflow: hidden;
    pointer-events: none;
}

.floating-shape {
    position: absolute;
    background: rgba(255, 255, 255, 0.1);
    border-radius: 50%;
}

.shape-1 {
    width: 80px;
    height: 80px;
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
    width: 100px;
    height: 100px;
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

.shape-5 {
    width: 120px;
    height: 120px;
    top: 10%;
    right: 50%;
    animation: float 7s ease-in-out infinite;
    animation-delay: 0.5s;
}

.particles-container {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    overflow: hidden;
    pointer-events: none;
}

.particle {
    position: absolute;
    width: 4px;
    height: 4px;
    background: rgba(255, 255, 255, 0.6);
    border-radius: 50%;
    animation: particleFloat 8s ease-in-out infinite;
}

.particle:nth-child(1) {
    top: 20%;
    left: 20%;
    animation-delay: 0s;
}

.particle:nth-child(2) {
    top: 40%;
    left: 60%;
    animation-delay: 1s;
}

.particle:nth-child(3) {
    top: 60%;
    left: 30%;
    animation-delay: 2s;
}

.particle:nth-child(4) {
    top: 30%;
    left: 80%;
    animation-delay: 3s;
}

.particle:nth-child(5) {
    top: 70%;
    left: 70%;
    animation-delay: 4s;
}

.particle:nth-child(6) {
    top: 50%;
    left: 10%;
    animation-delay: 5s;
}

.hero-overlay {
    position: relative;
    z-index: 2;
    padding: 80px 0;
}

/* Section Background Pattern */
.section-bg-pattern {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="dots" width="20" height="20" patternUnits="userSpaceOnUse"><circle cx="10" cy="10" r="1" fill="%23000" opacity="0.05"/></pattern></defs><rect width="100" height="100" fill="url(%23dots)"/></svg>');
}

/* Section Divider */
.divider {
    width: 80px;
    height: 4px;
    background: linear-gradient(90deg, #667eea, #764ba2);
    border-radius: 2px;
    transition: width 0.3s ease;
}

.section-header:hover .divider {
    width: 120px;
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

/* Featured Card */
.featured-card {
    border-radius: 20px;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.featured-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 20px 40px rgba(0,0,0,0.1) !important;
}

/* Article Cards */
.article-card {
    border-radius: 15px;
    transition: all 0.3s ease;
    overflow: hidden;
}

.article-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 15px 35px rgba(0,0,0,0.1);
}

.card-img-wrapper {
    position: relative;
    height: 200px;
    overflow: hidden;
}

.card-img-top {
    height: 100%;
    width: 100%;
    object-fit: cover;
    transition: transform 0.3s ease;
}

.article-card:hover .card-img-top {
    transform: scale(1.05);
}

.card-img-placeholder {
    height: 100%;
    background: linear-gradient(135deg, #f8f9fa, #e9ecef);
    display: flex;
    align-items: center;
    justify-content: center;
}

.card-img-overlay-gradient {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    height: 50%;
    background: linear-gradient(transparent, rgba(0,0,0,0.1));
}

/* Hover Effects */
.hover-primary:hover {
    color: #667eea !important;
    transition: color 0.3s ease;
}

/* Button Styles */
.btn-primary {
    background: linear-gradient(135deg, #667eea, #764ba2);
    border: none;
    transition: all 0.3s ease;
}

.btn-primary:hover {
    background: linear-gradient(135deg, #5a6fd8, #6a4190);
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(102, 126, 234, 0.3);
}

.btn-outline-primary {
    border-color: #667eea;
    color: #667eea;
    transition: all 0.3s ease;
}

.btn-outline-primary:hover {
    background: linear-gradient(135deg, #667eea, #764ba2);
    border-color: transparent;
    transform: translateY(-2px);
}

/* Responsive */
@media (max-width: 768px) {
    .hero-section {
        min-height: 50vh;
    }

    .display-4 {
        font-size: 2.5rem;
    }

    .featured-card .row {
        flex-direction: column-reverse;
    }
}

/* Empty State */
.empty-state {
    padding: 60px 20px;
}

/* Background Pattern */
.bg-light {
    background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%) !important;
}

/* Smooth Scrolling */
html {
    scroll-behavior: smooth;
}

/* Additional Modern Effects */
.min-vh-50 {
    min-height: 50vh;
}

.bg-gradient-primary {
    background: linear-gradient(135deg, #667eea, #764ba2) !important;
}
/* Scroll Animations */
.scroll-animate {
    opacity: 0;
    transform: translateY(50px);
    transition: all 0.6s ease;
}

.scroll-animate.animate {
    opacity: 1;
    transform: translateY(0);
}

/* Loading Animation */
.page-loading {
    opacity: 0;
    transition: opacity 0.5s ease;
}

.page-loaded {
    opacity: 1;
}
</style>

<!-- JavaScript for Animations -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Page loading animation
    document.body.classList.add('page-loading');

    window.addEventListener('load', function() {
        document.body.classList.remove('page-loading');
        document.body.classList.add('page-loaded');
    });

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

    // Add scroll animation to elements
    document.querySelectorAll('.article-card, .featured-card').forEach((el, index) => {
        el.classList.add('scroll-animate');
        el.style.transitionDelay = (index * 0.1) + 's';
        observer.observe(el);
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

    // Parallax effect for hero section
    window.addEventListener('scroll', function() {
        const scrolled = window.pageYOffset;
        const heroSection = document.querySelector('.hero-section');
        if (heroSection) {
            const rate = scrolled * -0.3;
            heroSection.style.transform = `translateY(${rate}px)`;
        }
    });

    // Add hover sound effect (optional)
    document.querySelectorAll('.article-card, .featured-card, .btn-animated').forEach(el => {
        el.addEventListener('mouseenter', function() {
            this.style.transition = 'all 0.3s cubic-bezier(0.4, 0, 0.2, 1)';
        });
    });

    // Dynamic particle animation
    const particles = document.querySelectorAll('.particle');
    particles.forEach((particle, index) => {
        particle.style.animationDelay = (index * 0.5) + 's';
        particle.style.animationDuration = (6 + Math.random() * 4) + 's';
    });

    // Enhanced card interactions
    document.querySelectorAll('.article-card').forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-12px) scale(1.02)';
            this.style.boxShadow = '0 25px 50px rgba(0,0,0,0.15)';
        });

        card.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0) scale(1)';
            this.style.boxShadow = '0 5px 15px rgba(0,0,0,0.08)';
        });
    });

    // Featured card enhanced interaction
    const featuredCard = document.querySelector('.featured-card');
    if (featuredCard) {
        featuredCard.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-15px) scale(1.02)';
            this.style.boxShadow = '0 30px 60px rgba(0,0,0,0.2)';
        });

        featuredCard.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0) scale(1)';
            this.style.boxShadow = '0 10px 30px rgba(0,0,0,0.1)';
        });
    }
});
</script>

<?= $this->include('template/public_footer'); ?>