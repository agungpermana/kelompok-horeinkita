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
    
    // Fix dangling </div> before @endsection
    $content = preg_replace('/<\/div>\s*@endsection\s*$/s', "\n@endsection\n", $content);
    
    file_put_contents($file, $content);
    echo "Fixed $file\n";
}
?>
