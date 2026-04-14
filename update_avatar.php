<?php
$files = [
    "resources/views/dashboard.blade.php",
    "resources/views/admin/users/index.blade.php",
    "resources/views/admin/pengaduan/index.blade.php",
    "resources/views/admin/pengaduan/show.blade.php",
    "resources/views/admin/pengaduan/arsip.blade.php"
];

$search = '<div class="h-8 w-8 rounded-full bg-gradient-to-tr from-red-500 to-orange-400 text-white flex items-center justify-center font-bold shadow-sm">
                    A
                </div>';

$replace = '<a href="{{ route(''profile.index'') }}" class="h-8 w-8 rounded-full bg-gradient-to-tr {{ Auth::user()->role == ''admin'' ? ''from-red-500 to-orange-400'' : ''from-blue-500 to-purple-400'' }} text-white flex items-center justify-center font-bold shadow-sm hover:scale-105 transition" title="Profil Saya">
                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                </a>';

foreach($files as $file) {
    if(file_exists($file)) {
        $content = file_get_contents($file);
        $content = str_replace($search, $replace, $content);
        file_put_contents($file, $content);
        echo "Updated $file\n";
    }
}

