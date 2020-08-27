<?php
$data = count(json_decode(file_get_contents(base_path('resources/js/json/tools.json')),true));
return [
    "meta-title" => $data." SEO Tools (Gratis) Versi Bahasa Indonesia \ cmlabs",
    "meta-desc" => "Cek website dengan Free SEO Tools cmlabs: Page Speed Test, SItemap Generator, Word Counter, Title & Meta Desc Checker, dll.",
    "meta-keyword" => "seo, free seo tool, content writing, copywriting",
    "lang" => "id",
    "desc"  => "PT CMLABS INDONESIA DIGITAL adalah sebuah perusahaan yang fokus pada jasa SEO, Marketing dan platform pendukung aktifitas SEO.Umumnya kami menggunakan nama pendek yaitu CMLABS, yang merupakan singkatan dari Content Marketing Labs.",
    "link"  => "Kunjungi Website",
    "feature"   => "Fitur",
    "detail-link"   => "Lihat Details",   
    "seo-title" => "SEO Dari Kontributor",
    "reasons-title" => "Mengapa Memilih Kami",
];
