<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Detail Laporan Saya - Aduan Sarana Sekolah</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700" rel="stylesheet" />
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <script src="https://cdn.tailwindcss.com"></script>
    @endif
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-[#F8F9FA] text-gray-800 antialiased min-h-screen flex flex-col">

    <!-- Header (Simple) -->
    <header class="h-20 bg-white border-b border-gray-200 sticky top-0 z-10 shadow-sm">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 h-full flex items-center justify-between">
            <div class="flex items-center gap-4">
                <a href="{{ route('student.pengaduan.index') }}" class="p-2 rounded-full hover:bg-gray-100 transition text-gray-500">
                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                </a>
                <h1 class="text-xl font-semibold text-gray-900">Detail Laporan</h1>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="flex-1 w-full max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
        <div class="bg-white rounded-3xl shadow-[0_20px_40px_rgba(0,0,0,0.04)] border border-gray-100 overflow-hidden">
            <!-- Header Status -->
            <div class="px-8 py-6 border-b border-gray-100 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 bg-gray-50/50">
                <div>
                    <h1 class="text-2xl font-bold text-gray-900">{{ $pengaduan->judul }}</h1>
                    <p class="text-sm text-gray-500 mt-1">Dilaporkan pada {{ $pengaduan->created_at->translatedFormat('d M Y, H:i') }}</p>
                </div>
                <div>
                    @if($pengaduan->status == 'pending')
                        <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-semibold bg-orange-100 text-orange-700 border border-orange-200 shadow-sm">
                            ⏳ Belum Diproses
                        </span>
                    @elseif($pengaduan->status == 'proses')
                        <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-semibold bg-yellow-100 text-yellow-700 border border-yellow-200 shadow-sm">
                            🚀 Sedang Diproses
                        </span>
                    @elseif($pengaduan->status == 'selesai')
                        <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-semibold bg-green-100 text-green-700 border border-green-200 shadow-sm">
                            ✅ Selesai
                        </span>
                    @elseif($pengaduan->status == 'ditolak')
                        <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-semibold bg-red-100 text-red-700 border border-red-200 shadow-sm">
                            ❌ Ditolak
                        </span>
                    @endif
                </div>
            </div>

            <div class="p-8">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-8">
                    <div class="bg-gray-50 rounded-xl p-4 border border-gray-100">
                        <p class="text-xs font-medium text-gray-500 uppercase tracking-wider mb-1">Tiket Aduan</p>
                        <p class="font-bold font-mono text-gray-900 text-lg">#{{ str_pad($pengaduan->id, 5, '0', STR_PAD_LEFT) }}</p>
                    </div>
                    <div class="bg-gray-50 rounded-xl p-4 border border-gray-100">
                        <p class="text-xs font-medium text-gray-500 uppercase tracking-wider mb-1">Kategori Sarana</p>
                        <div class="flex items-center gap-3 mt-1">
                            <div class="w-8 h-8 rounded-full bg-red-100 text-red-600 flex items-center justify-center">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/></svg>
                            </div>
                            <p class="font-semibold text-gray-900">{{ $pengaduan->category->name ?? 'Lainnya' }}</p>
                        </div>
                    </div>
                </div>

                <div class="mb-10">
                    <h3 class="text-lg font-semibold text-gray-900 mb-3">Deskripsi Laporan</h3>
                    <div class="p-6 bg-white rounded-xl border border-gray-200 text-gray-700 leading-relaxed shadow-sm">
                        {{ $pengaduan->deskripsi }}
                    </div>
                </div>

                @if($pengaduan->tanggapan)
                <div class="mb-10">
                    <h3 class="text-lg font-semibold text-gray-900 mb-3 flex items-center gap-2">
                        <svg class="w-5 h-5 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        Tanggapan Sekolah
                    </h3>
                    <div class="p-6 bg-green-50 rounded-xl border border-green-100 text-green-800 leading-relaxed shadow-sm">
                        {{ $pengaduan->tanggapan }}
                    </div>
                </div>
                @endif

                @if($pengaduan->foto_path)
                <div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-3">Bukti Foto</h3>
                    <div class="rounded-2xl overflow-hidden border border-gray-200 shadow-sm inline-block max-w-full">
                        <img src="{{ asset('storage/' . $pengaduan->foto_path) }}" alt="Foto Aduan" class="max-w-full h-auto max-h-[500px] object-cover hover:opacity-95 transition cursor-zoom-in" onclick="window.open(this.src, '_blank')">
                    </div>
                </div>
                @endif
            </div>
            
            <div class="px-8 py-5 border-t border-gray-100 bg-gray-50 flex justify-end">
                <a href="{{ route('student.pengaduan.index') }}" class="px-6 py-2.5 bg-white border border-gray-300 rounded-xl text-sm font-medium text-gray-700 hover:bg-gray-50 transition shadow-sm">Kembali ke Daftar</a>
            </div>
        </div>
    </main>
</body>
</html>
