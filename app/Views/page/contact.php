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
        <div class="floating-shape shape-5"></div>
    </div>

    <!-- Particles Background -->
    <div class="particles-container">
        <div class="particle"></div>
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
                        <i class="bi bi-envelope me-1"></i>Kontak
                    </span>
                    <h1 class="display-4 fw-bold mb-3 animate-slide-up">Hubungi Kami</h1>
                    <p class="lead animate-slide-up" style="animation-delay: 0.2s;">Kami siap membantu dan mendengar masukan Anda</p>
                    <div class="animate-slide-up" style="animation-delay: 0.4s;">
                        <a href="#contact-form" class="btn btn-light btn-lg px-4 py-2 rounded-pill btn-animated me-3">
                            <i class="bi bi-chat-dots me-2"></i>Kirim Pesan
                        </a>
                        <a href="#contact-info" class="btn btn-outline-light btn-lg px-4 py-2 rounded-pill btn-animated">
                            <i class="bi bi-info-circle me-2"></i>Info Kontak
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Content Section -->
<div id="contact-info" class="container py-5 position-relative">
    <!-- Section Background Pattern -->
    <div class="section-bg-pattern"></div>

    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="text-center mb-5">
                <span class="badge bg-primary mb-3 px-3 py-2 rounded-pill animate-bounce-in" style="animation-delay: 0.3s;">
                    <i class="bi bi-telephone me-1"></i>Kontak Kami
                </span>
                <h2 class="fw-bold mb-4 animate-slide-up" style="animation-delay: 0.4s;">Mari Terhubung</h2>
                <p class="text-muted animate-fade-in" style="animation-delay: 0.5s;">
                    Hubungi kami melalui berbagai cara yang tersedia
                </p>
            </div>

            <div class="row">
                <!-- Contact Info -->
                <div class="col-md-6 mb-4">
                    <div class="card h-100 shadow-lg border-0 animate-scale-in" style="animation-delay: 0.6s;">
                        <div class="card-body p-4">
                            <h3 class="card-title mb-4 animate-slide-up" style="animation-delay: 0.7s;">
                                <i class="bi bi-info-circle text-primary me-2"></i>Informasi Kontak
                            </h3>

                            <div class="contact-item mb-3 animate-fade-in" style="animation-delay: 0.8s;">
                                <div class="d-flex align-items-center">
                                    <div class="icon-wrapper bg-primary text-white rounded-circle p-2 me-3">
                                        <i class="bi bi-geo-alt"></i>
                                    </div>
                                    <div>
                                        <h6 class="mb-1">Alamat</h6>
                                        <p class="mb-0 text-muted">Jl. Teknologi No. 123<br>Jakarta Selatan, 12345</p>
                                    </div>
                                </div>
                            </div>

                            <div class="contact-item mb-3 animate-fade-in" style="animation-delay: 0.9s;">
                                <div class="d-flex align-items-center">
                                    <div class="icon-wrapper bg-primary text-white rounded-circle p-2 me-3">
                                        <i class="bi bi-telephone"></i>
                                    </div>
                                    <div>
                                        <h6 class="mb-1">Telepon</h6>
                                        <p class="mb-0 text-muted">+62 21 1234 5678</p>
                                    </div>
                                </div>
                            </div>

                            <div class="contact-item mb-3 animate-fade-in" style="animation-delay: 1.0s;">
                                <div class="d-flex align-items-center">
                                    <div class="icon-wrapper bg-primary text-white rounded-circle p-2 me-3">
                                        <i class="bi bi-envelope"></i>
                                    </div>
                                    <div>
                                        <h6 class="mb-1">Email</h6>
                                        <p class="mb-0 text-muted">info@portalberita.com</p>
                                    </div>
                                </div>
                            </div>

                            <div class="contact-item animate-fade-in" style="animation-delay: 1.1s;">
                                <div class="d-flex align-items-center">
                                    <div class="icon-wrapper bg-primary text-white rounded-circle p-2 me-3">
                                        <i class="bi bi-clock"></i>
                                    </div>
                                    <div>
                                        <h6 class="mb-1">Jam Operasional</h6>
                                        <p class="mb-0 text-muted">Senin - Jumat: 09:00 - 17:00<br>Sabtu: 09:00 - 12:00</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Contact Form -->
                <div class="col-md-6 mb-4">
                    <div id="contact-form" class="card h-100 shadow-lg border-0 animate-scale-in" style="animation-delay: 0.7s;">
                        <div class="card-body p-4">
                            <h3 class="card-title mb-4 animate-slide-up" style="animation-delay: 0.8s;">
                                <i class="bi bi-chat-dots text-primary me-2"></i>Kirim Pesan
                            </h3>

                            <form>
                                <div class="mb-3 animate-fade-in" style="animation-delay: 0.9s;">
                                    <label for="name" class="form-label">Nama Lengkap</label>
                                    <input type="text" class="form-control form-control-animated" id="name" required>
                                </div>

                                <div class="mb-3 animate-fade-in" style="animation-delay: 1.0s;">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control form-control-animated" id="email" required>
                                </div>

                                <div class="mb-3 animate-fade-in" style="animation-delay: 1.1s;">
                                    <label for="subject" class="form-label">Subjek</label>
                                    <input type="text" class="form-control form-control-animated" id="subject" required>
                                </div>

                                <div class="mb-3 animate-fade-in" style="animation-delay: 1.2s;">
                                    <label for="message" class="form-label">Pesan</label>
                                    <textarea class="form-control form-control-animated" id="message" rows="5" required></textarea>
                                </div>

                                <div class="animate-fade-in" style="animation-delay: 1.3s;">
                                    <button type="submit" class="btn btn-primary w-100 btn-animated">
                                        <i class="bi bi-send me-2"></i>Kirim Pesan
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Social Media -->
            <div class="row mt-5">
                <div class="col-12">
                    <div class="card shadow-lg border-0 animate-scale-in" style="animation-delay: 1.4s;">
                        <div class="card-body p-4 text-center">
                            <h4 class="mb-4 animate-slide-up" style="animation-delay: 1.5s;">
                                <i class="bi bi-share text-primary me-2"></i>Ikuti Kami di Media Sosial
                            </h4>
                            <div class="d-flex justify-content-center gap-3 flex-wrap">
                                <a href="#" class="btn btn-outline-primary btn-social animate-bounce-in" style="animation-delay: 1.6s;">
                                    <i class="bi bi-facebook"></i> Facebook
                                </a>
                                <a href="#" class="btn btn-outline-info btn-social animate-bounce-in" style="animation-delay: 1.7s;">
                                    <i class="bi bi-twitter"></i> Twitter
                                </a>
                                <a href="#" class="btn btn-outline-danger btn-social animate-bounce-in" style="animation-delay: 1.8s;">
                                    <i class="bi bi-instagram"></i> Instagram
                                </a>
                                <a href="#" class="btn btn-outline-primary btn-social animate-bounce-in" style="animation-delay: 1.9s;">
                                    <i class="bi bi-linkedin"></i> LinkedIn
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="text-center mt-4">
                <a href="<?= base_url('/'); ?>" class="btn btn-outline-primary">
                    <i class="bi bi-arrow-left me-2"></i>Kembali ke Beranda
                </a>
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

@keyframes pulse {
    0% {
        transform: scale(1);
        opacity: 1;
    }
    50% {
        transform: scale(1.05);
        opacity: 0.8;
    }
    100% {
        transform: scale(1);
        opacity: 1;
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

/* Social Media Buttons */
.btn-social {
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
    margin: 0.25rem;
}

.btn-social:hover {
    transform: translateY(-5px) scale(1.05);
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
}

/* Contact Items */
.contact-item {
    transition: all 0.3s ease;
    padding: 1rem;
    border-radius: 10px;
    margin-bottom: 1rem;
}

.contact-item:hover {
    background: rgba(13, 110, 253, 0.05);
    transform: translateX(10px);
}

.icon-wrapper {
    width: 40px;
    height: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.3s ease;
}

.contact-item:hover .icon-wrapper {
    transform: scale(1.1) rotate(5deg);
    animation: pulse 1s ease-in-out;
}

/* Form Animations */
.form-control-animated {
    transition: all 0.3s ease;
    border: 2px solid #e9ecef;
}

.form-control-animated:focus {
    border-color: #0d6efd;
    box-shadow: 0 0 0 0.2rem rgba(13, 110, 253, 0.25);
    transform: scale(1.02);
}

.form-control-animated:hover {
    border-color: #0d6efd;
    transform: translateY(-2px);
}

/* Card Animations */
.card {
    transition: all 0.4s ease;
    border: none;
    border-radius: 15px;
}

.card:hover {
    transform: translateY(-10px);
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1) !important;
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

    .btn-social {
        margin-bottom: 0.5rem;
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
    document.querySelectorAll('.card, .contact-item').forEach((el, index) => {
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

    // Form interaction animations
    const formInputs = document.querySelectorAll('.form-control-animated');
    formInputs.forEach(input => {
        input.addEventListener('focus', function() {
            this.parentElement.style.transform = 'scale(1.02)';
            this.parentElement.style.transition = 'transform 0.3s ease';
        });

        input.addEventListener('blur', function() {
            this.parentElement.style.transform = 'scale(1)';
        });
    });

    // Contact item hover effects
    const contactItems = document.querySelectorAll('.contact-item');
    contactItems.forEach(item => {
        item.addEventListener('mouseenter', function() {
            this.style.background = 'rgba(13, 110, 253, 0.05)';
            this.style.transform = 'translateX(10px)';
        });

        item.addEventListener('mouseleave', function() {
            this.style.background = 'transparent';
            this.style.transform = 'translateX(0)';
        });
    });

    // Social media button effects
    const socialButtons = document.querySelectorAll('.btn-social');
    socialButtons.forEach(btn => {
        btn.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-5px) scale(1.05)';
        });

        btn.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0) scale(1)';
        });
    });
});
</script>

<?= $this->include('template/public_footer'); ?>
