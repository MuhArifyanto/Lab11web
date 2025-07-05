<?= $this->include('template/admin_header'); ?>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">
                        <i class="bi bi-person-circle me-2"></i>Profile Admin
                    </h4>
                </div>
                <div class="card-body p-4">
                    <div class="row">
                        <div class="col-md-4 text-center mb-4">
                            <div class="profile-avatar">
                                <i class="bi bi-person-circle text-primary" style="font-size: 8rem;"></i>
                            </div>
                            <h5 class="mt-3"><?= htmlspecialchars($user['username']); ?></h5>
                            <p class="text-muted">Administrator</p>
                        </div>
                        <div class="col-md-8">
                            <h5 class="mb-3">Informasi Profile</h5>
                            
                            <div class="row mb-3">
                                <div class="col-sm-4">
                                    <strong>User ID:</strong>
                                </div>
                                <div class="col-sm-8">
                                    <?= htmlspecialchars($user['user_id']); ?>
                                </div>
                            </div>
                            
                            <div class="row mb-3">
                                <div class="col-sm-4">
                                    <strong>Username:</strong>
                                </div>
                                <div class="col-sm-8">
                                    <?= htmlspecialchars($user['username']); ?>
                                </div>
                            </div>
                            
                            <div class="row mb-3">
                                <div class="col-sm-4">
                                    <strong>Email:</strong>
                                </div>
                                <div class="col-sm-8">
                                    <?= htmlspecialchars($user['email']); ?>
                                </div>
                            </div>
                            
                            <div class="row mb-3">
                                <div class="col-sm-4">
                                    <strong>Role:</strong>
                                </div>
                                <div class="col-sm-8">
                                    <span class="badge bg-success">Administrator</span>
                                </div>
                            </div>
                            
                            <div class="row mb-3">
                                <div class="col-sm-4">
                                    <strong>Status:</strong>
                                </div>
                                <div class="col-sm-8">
                                    <span class="badge bg-success">
                                        <i class="bi bi-check-circle me-1"></i>Active
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <hr>
                    
                    <div class="row">
                        <div class="col-12">
                            <h5 class="mb-3">Quick Actions</h5>
                            <div class="d-flex gap-2 flex-wrap">
                                <a href="<?= base_url('admin/artikel'); ?>" class="btn btn-primary">
                                    <i class="bi bi-speedometer2 me-1"></i>Dashboard
                                </a>
                                <a href="<?= base_url('admin/artikel/add'); ?>" class="btn btn-success">
                                    <i class="bi bi-plus-circle me-1"></i>Tambah Artikel
                                </a>
                                <a href="<?= base_url('artikel'); ?>" class="btn btn-info">
                                    <i class="bi bi-file-text me-1"></i>Lihat Artikel
                                </a>
                                <a href="<?= base_url('user/logout'); ?>" class="btn btn-outline-danger">
                                    <i class="bi bi-box-arrow-right me-1"></i>Logout
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Session Info Card -->
            <div class="card shadow-sm mt-4">
                <div class="card-header bg-info text-white">
                    <h5 class="mb-0">
                        <i class="bi bi-info-circle me-2"></i>Session Information
                    </h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <p><strong>Session ID:</strong><br>
                            <small class="text-muted"><?= session_id(); ?></small></p>
                        </div>
                        <div class="col-md-6">
                            <p><strong>Login Status:</strong><br>
                            <span class="badge bg-success">Logged In</span></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.profile-avatar {
    transition: transform 0.3s ease;
}

.profile-avatar:hover {
    transform: scale(1.05);
}

.card {
    border: none;
    border-radius: 15px;
}

.card-header {
    border-radius: 15px 15px 0 0 !important;
}

.btn {
    border-radius: 8px;
}
</style>

<?= $this->include('template/footer'); ?>
