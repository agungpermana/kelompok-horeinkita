<?php
$files = [
    'E:/Kerjaan/Laravel/kelompok-horeinkita/resources/views/admin/donatur/index.blade.php',
    'E:/Kerjaan/Laravel/kelompok-horeinkita/resources/views/admin/penerimas/create.blade.php',
    'E:/Kerjaan/Laravel/kelompok-horeinkita/resources/views/admin/penerimas/edit.blade.php',
    'E:/Kerjaan/Laravel/kelompok-horeinkita/resources/views/admin/penerimas/index.blade.php',
    'E:/Kerjaan/Laravel/kelompok-horeinkita/resources/views/admin/penyaluran/index.blade.php',
    'E:/Kerjaan/Laravel/kelompok-horeinkita/resources/views/admin/survey/create.blade.php',
    'E:/Kerjaan/Laravel/kelompok-horeinkita/resources/views/admin/survey/export.blade.php',
    'E:/Kerjaan/Laravel/kelompok-horeinkita/resources/views/admin/survey/index.blade.php',
    'E:/Kerjaan/Laravel/kelompok-horeinkita/resources/views/admin/transaksi/index.blade.php',
    'E:/Kerjaan/Laravel/kelompok-horeinkita/resources/views/admin/warung/create.blade.php',
    'E:/Kerjaan/Laravel/kelompok-horeinkita/resources/views/admin/warung/index.blade.php'
];

foreach ($files as $file) {
    if (!file_exists($file)) continue;
    $content = file_get_contents($file);
    
    // Extract title
    preg_match('/<title>(.*?)<\/title>/s', $content, $matches);
    $title = isset($matches[1]) ? trim($matches[1]) : 'Admin Dashboard';
    
    // Extract active menu
    preg_match('/\[\'active\'\s*=>\s*\'(.*?)\'\]/s', $content, $matches);
    $activeMenu = isset($matches[1]) ? trim($matches[1]) : 'dashboard';
    
    // Extract page title (h1)
    preg_match('/<h1[^>]*>(.*?)<\/h1>/s', $content, $matches);
    $pageTitle = isset($matches[1]) ? trim($matches[1]) : 'Dashboard';
    
    // Replace top boilerplate
    $patternTop = '/<!DOCTYPE html>.*?<div class="p-margin-mobile[^>]*>/s';
    $replacementTop = "@extends('layouts.admin')\n\n@section('title', '$title')\n@section('active_menu', '$activeMenu')\n@section('page_title', '$pageTitle')\n\n@section('content')";
    $content = preg_replace($patternTop, $replacementTop, $content);
    
    // Replace bottom boilerplate
    $patternBottom = '/<\/div>\s*<\/main>\s*<\/body>\s*<\/html>/s';
    $replacementBottom = "@endsection";
    $content = preg_replace($patternBottom, $replacementBottom, $content);
    
    file_put_contents($file, $content);
    echo "Processed $file\n";
}
?>
