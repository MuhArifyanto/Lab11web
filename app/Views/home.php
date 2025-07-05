<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>

<h1><?= $title; ?></h1>
<hr>
<div class="contact-form">
    <?= $content; ?>
</div>

<?= $this->endSection() ?>