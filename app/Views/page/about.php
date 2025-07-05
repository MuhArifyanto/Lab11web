<?= $this->include('template/public_header'); ?>

<!-- Hero Section -->
<div class="hero-section bg-primary text-white py-5 position-relative overflow-hidden">
    <!-- Animated Background -->
    <div class="hero-bg-animation"></div>
    <div class="floating-elements">
        <div class="floating-shape shape-1"></div>
        <div class="floating-shape shape-2"></div>
        <div class="floating-shape shape-3"></div>
        <div class="floating-shape shape-4"></div>
    </div>

    <!-- Particles Background -->
    <div class="particles-container">
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
    </div>

    <div class="container position-relative">
        <div class="row">
            <div class="col-12 text-center">
                <div class="hero-content">
                    <span class="badge bg-light text-primary mb-3 px-3 py-2 rounded-pill animate-bounce-in">
                        <i class="bi bi-info-circle me-1"></i>Tentang
                    </span>
                    <h1 class="display-4 fw-bold mb-3 animate-slide-up">Tentang Kami</h1>
                    <p class="lead animate-slide-up" style="animation-delay: 0.2s;">Portal Berita Terpercaya untuk Indonesia</p>
                    <div class="animate-slide-up" style="animation-delay: 0.4s;">
                        <a href="#content" class="btn btn-light btn-lg px-4 py-2 rounded-pill btn-animated">
                            <i class="bi bi-arrow-down me-2"></i>Pelajari Lebih Lanjut
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Content Section -->
<div id="content" class="container py-5 position-relative">
    <!-- Section Background Pattern -->
    <div class="section-bg-pattern"></div>

    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="card shadow-lg border-0 animate-scale-in" style="animation-delay: 0.3s;">
                <div class="card-body p-5">
                    <div class="text-center mb-5">
                        <span class="badge bg-primary mb-3 px-3 py-2 rounded-pill animate-bounce-in" style="animation-delay: 0.5s;">
                            <i class="bi bi-newspaper me-1"></i>Portal Berita
                        </span>
                        <h2 class="mb-4 animate-slide-up" style="animation-delay: 0.6s;">Portal Berita Terkini & Terpercaya</h2>
                    </div>

                    <p class="lead animate-fade-in" style="animation-delay: 0.7s;">Portal Berita adalah platform digital yang berkomitmen menyajikan informasi terkini, akurat, dan terpercaya untuk masyarakat Indonesia.</p>
                    
                    <div class="animate-slide-up" style="animation-delay: 0.8s;">
                        <h3 class="mt-5 mb-3">
                            <i class="bi bi-eye text-primary me-2"></i>Visi Kami
                        </h3>
                        <p>Menjadi portal berita digital terdepan yang menyajikan informasi berkualitas tinggi dan dapat dipercaya oleh seluruh masyarakat Indonesia.</p>
                    </div>

                    <div class="animate-slide-up" style="animation-delay: 0.9s;">
                        <h3 class="mt-4 mb-3">
                            <i class="bi bi-target text-primary me-2"></i>Misi Kami
                        </h3>
                        <ul class="list-unstyled">
                            <li class="mb-2 animate-fade-in" style="animation-delay: 1.0s;">
                                <i class="bi bi-check-circle text-success me-2"></i>
                                Menyajikan berita yang akurat, berimbang, dan dapat dipertanggungjawabkan
                            </li>
                            <li class="mb-2 animate-fade-in" style="animation-delay: 1.1s;">
                                <i class="bi bi-check-circle text-success me-2"></i>
                                Memberikan informasi terkini dari berbagai bidang kehidupan
                            </li>
                            <li class="mb-2 animate-fade-in" style="animation-delay: 1.2s;">
                                <i class="bi bi-check-circle text-success me-2"></i>
                                Mendukung literasi digital masyarakat Indonesia
                            </li>
                            <li class="mb-2 animate-fade-in" style="animation-delay: 1.3s;">
                                <i class="bi bi-check-circle text-success me-2"></i>
                                Menjadi jembatan informasi yang menghubungkan berbagai kalangan
                            </li>
                        </ul>
                    </div>
                    
                    <div class="animate-slide-up" style="animation-delay: 1.4s;">
                        <h3 class="mt-4 mb-3">
                            <i class="bi bi-grid text-primary me-2"></i>Kategori Berita
                        </h3>
                        <div class="row">
                            <div class="col-md-6">
                                <ul class="list-unstyled">
                                    <li class="mb-2 animate-fade-in" style="animation-delay: 1.5s;">
                                        <i class="bi bi-laptop text-primary me-2"></i>Teknologi
                                    </li>
                                    <li class="mb-2 animate-fade-in" style="animation-delay: 1.6s;">
                                        <i class="bi bi-trophy text-primary me-2"></i>Olahraga
                                    </li>
                                    <li class="mb-2 animate-fade-in" style="animation-delay: 1.7s;">
                                        <i class="bi bi-bank text-primary me-2"></i>Politik
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <ul class="list-unstyled">
                                    <li class="mb-2 animate-fade-in" style="animation-delay: 1.8s;">
                                        <i class="bi bi-graph-up text-primary me-2"></i>Ekonomi
                                    </li>
                                    <li class="mb-2 animate-fade-in" style="animation-delay: 1.9s;">
                                        <i class="bi bi-music-note text-primary me-2"></i>Hiburan
                                    </li>
                                    <li class="mb-2 animate-fade-in" style="animation-delay: 2.0s;">
                                        <i class="bi bi-plus-circle text-primary me-2"></i>Dan lainnya
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="animate-slide-up" style="animation-delay: 2.1s;">
                        <h3 class="mt-4 mb-3">
                            <i class="bi bi-heart text-primary me-2"></i>Komitmen Kami
                        </h3>
                        <div class="row">
                            <div class="col-md-4 text-center mb-3">
                                <div class="feature-box animate-bounce-in" style="animation-delay: 2.2s;">
                                    <div class="feature-icon-wrapper">
                                        <i class="bi bi-shield-check text-primary feature-icon"></i>
                                        <div class="icon-bg-circle"></div>
                                    </div>
                                    <h5 class="mt-2">Terpercaya</h5>
                                    <p class="small">Informasi yang telah diverifikasi</p>
                                </div>
                            </div>
                            <div class="col-md-4 text-center mb-3">
                                <div class="feature-box animate-bounce-in" style="animation-delay: 2.3s;">
                                    <div class="feature-icon-wrapper">
                                        <i class="bi bi-lightning-charge text-primary feature-icon"></i>
                                        <div class="icon-bg-circle"></div>
                                    </div>
                                    <h5 class="mt-2">Terkini</h5>
                                    <p class="small">Update berita setiap hari</p>
                                </div>
                            </div>
                            <div class="col-md-4 text-center mb-3">
                                <div class="feature-box animate-bounce-in" style="animation-delay: 2.4s;">
                                    <div class="feature-icon-wrapper">
                                        <i class="bi bi-people text-primary feature-icon"></i>
                                        <div class="icon-bg-circle"></div>
                                    </div>
                                    <h5 class="mt-2">Untuk Semua</h5>
                                    <p class="small">Akses gratis untuk semua kalangan</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="text-center mt-5 animate-slide-up" style="animation-delay: 2.5s;">
                        <a href="<?= base_url('artikel'); ?>" class="btn btn-primary btn-lg me-3 btn-animated">
                            <i class="bi bi-newspaper me-2"></i>Baca Artikel
                        </a>
                        <a href="<?= base_url('contact'); ?>" class="btn btn-outline-primary btn-lg btn-animated">
                            <i class="bi bi-envelope me-2"></i>Hubungi Kami
                        </a>
                    </div>
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
    background: linear-gradient(135deg, #0d6efd 0%, #6610f2 100%);
    min-height: 60vh;
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

/* Section Background Pattern */
.section-bg-pattern {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="dots" width="20" height="20" patternUnits="userSpaceOnUse"><circle cx="10" cy="10" r="1" fill="%23000" opacity="0.05"/></pattern></defs><rect width="100" height="100" fill="url(%23dots)"/></svg>');
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
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 80px;
    height: 80px;
    background: rgba(13, 110, 253, 0.1);
    border-radius: 50%;
    z-index: 1;
    animation: float 2s ease-in-out infinite;
}

/* Responsive */
@media (max-width: 768px) {
    .floating-shape {
        display: none;
    }

    .particle {
        display: none;
    }

    .hero-section {
        min-height: 50vh;
    }
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
</style>

<!-- JavaScript for Animations -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Page loading animation
    document.body.style.opacity = '0';
    document.body.style.transition = 'opacity 0.5s ease';

    window.addEventListener('load', function() {
        document.body.style.opacity = '1';
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
    document.querySelectorAll('.feature-box, .card').forEach((el, index) => {
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
});
</script>

<?= $this->include('template/public_footer'); ?>
