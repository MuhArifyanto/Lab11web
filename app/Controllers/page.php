<?php
namespace App\Controllers;
class Page extends BaseController
{
    public function about()
    {
        return view('about', [
            'title' => 'Tentang Kami - Portal Berita',
            'content' => 'Portal Berita adalah platform digital yang menyediakan informasi terkini dan terpercaya.'
        ]);
    }
    public function contact()
    {
        return view('contact', [
            'title' => 'Hubungi Kami - Portal Berita'
        ]);
    }
    public function faqs()
    {
    echo "Ini halaman FAQ";
    }
    public function tos()
    {
    echo "ini halaman Term of Services";
    }
}
