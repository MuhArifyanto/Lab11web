<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Pastikan Auto Routing dimatikan jika kamu pakai route manual
$routes->setAutoRoute(false);

// Set default namespace dan controller
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');

// ✅ ROUTE UTAMA / UMUM (PUBLIC)
$routes->get('/', 'Home::index');               // ⬅️ Halaman depan ke home page
$routes->get('debug-artikel', 'Home::debugArtikel'); // Debug artikel untuk home
$routes->get('fix-artikel', 'Home::fixArtikel'); // Fix artikel table
$routes->get('test-artikel-detail', 'Home::testArtikelDetail'); // Test artikel detail links
$routes->get('debug-session', 'Home::debugSession'); // Debug session
$routes->get('dashboard', 'Dashboard::index');  // Route dashboard

// Page routes
$routes->get('about', 'Page::about');
$routes->get('contact', 'Page::contact');
$routes->get('faqs', 'Page::faqs');
$routes->get('artikel', 'Artikel::index');      // Daftar artikel (tanpa slash depan)
$routes->get('about', 'Page::about');           // Halaman About
$routes->get('contact', 'Page::contact');       // Halaman Contact
$routes->get('faqs', 'Page::faqs');             // Halaman FAQ

// ✅ ROUTE ARTIKEL PUBLIC (VIEW BERDASARKAN SLUG)
$routes->get('artikel/(:segment)', 'Artikel::view/$1'); // View artikel berdasarkan slug

// ✅ ROUTE AUTHENTIKASI USER
$routes->get('user/login', 'User::login');
$routes->post('user/login', 'User::login');
$routes->get('user/logout', 'User::logout');
$routes->get('user/profile', 'User::profile'); // Route untuk profile admin
$routes->get('pengguna/profil', 'Pengguna::profil'); // Redirect route untuk compatibility
$routes->get('pengguna', 'Pengguna::index'); // Redirect route untuk compatibility
$routes->get('user/create-admin', 'User::createAdmin'); // Route sementara untuk buat admin
$routes->get('user/test-db', 'User::testDb'); // Route untuk test database
$routes->get('user/test-login', 'User::testLogin'); // Route untuk test login process

// ✅ ROUTE ADMIN (DENGAN FILTER AUTH)
$routes->group('admin', ['filter' => 'auth'], function ($routes) {
    $routes->get('artikel', 'Artikel::admin_index');             // Dashboard artikel admin

    // Route spesifik di atas (:segment)
    $routes->get('artikel/add', 'Artikel::add');                 // Tambah artikel (GET)
    $routes->post('artikel/add', 'Artikel::add');                // Tambah artikel (POST)
    $routes->get('artikel/edit/(:segment)', 'Artikel::edit/$1'); // Edit artikel (GET)
    $routes->post('artikel/edit/(:segment)', 'Artikel::edit/$1'); // Edit artikel (POST)
    $routes->get('artikel/delete/(:segment)', 'Artikel::delete/$1'); // Hapus artikel
    $routes->get('artikel/artikel-kedua', 'Artikel::artikelKedua');  // Artikel khusus

    // ✅ RESTful routes untuk Post di admin
    $routes->resource('adminpost', ['controller' => 'Post']);
});

// ✅ ROUTE API POST (DILUAR ADMIN)
$routes->resource('apipost', ['controller' => 'Post']);
