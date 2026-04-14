<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Laporan Saya - Aduan Sarana Sekolah</title>
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
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-full flex items-center justify-between">
            <div class="flex items-center gap-4">
                <a href="{{ route('student.dashboard') }}" class="p-2 rounded-full hover:bg-gray-100 transition text-gray-500">
                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                </a>
                <h1 class="text-xl font-semibold text-gray-900">Riwayat Laporan Saya</h1>
            </div>
            <a href="{{ route('student.pengaduan.create') }}" class="py-2.5 px-4 bg-red-50 text-red-600 rounded-xl font-medium hover:bg-red-100 transition flex items-center gap-2">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                Buat Laporan Baru
            </a>
        </div>
    </header>

    <!-- Main Content -->
    <main class="flex-1 w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden flex flex-col">
            <div class="px-6 py-5 border-b border-gray-100">
                <h3 class="font-semibold text-gray-900">Semua Pengaduan Saya ({{ $pengaduans->count() }})</h3>
            </div>
            
            <div class="p-0 flex-1">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-gray-50 text-gray-500 text-sm">
                                <th class="px-6 py-4 font-medium">Judul Pengaduan</th>
                                <th class="px-6 py-4 font-medium">Kategori</th>
                                <th class="px-6 py-4 font-medium">Dikirim Pada</th>
                                <th class="px-6 py-4 font-medium">Status</th>
                                <th class="px-6 py-4 font-medium text-right">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100 text-sm">
                            @forelse($pengaduans as $pengaduan)
                            <tr class="hover:bg-gray-50 transition">
                                <td class="px-6 py-4 text-gray-900 font-medium">
                                    {{ $pengaduan->judul }}
                                    <div class="text-xs text-gray-400 mt-1 truncate max-w-[200px]">{{ $pengaduan->deskripsi }}</div>
                                </td>
                                <td class="px-6 py-4 text-gray-500">{{ $pengaduan->category->name ?? '-' }}</td>
                                <td class="px-6 py-4 text-gray-500">{{ $pengaduan->created_at->translatedFormat('d M Y, H:i') }}</td>
                                <td class="px-6 py-4">
                                    @if($pengaduan->status == 'pending')
                                        <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-orange-100 text-orange-700">Belum diproses</span>
                                    @elseif($pengaduan->status == 'proses')
                                        <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-yellow-100 text-yellow-700">Sedang diproses</span>
                                    @else
                                        <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-green-100 text-green-700">Selesai</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 text-right">
                                    <a href="{{ route('student.pengaduan.show', $pengaduan->id) }}" class="text-gray-500 hover:text-red-500 font-medium text-sm px-3 py-1.5 bg-white border border-gray-200 rounded-lg shadow-sm transition inline-block">Lihat Detail</a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="px-6 py-16 text-center">
                                    <div class="flex flex-col items-center justify-center text-gray-400">
                                        <svg class="w-16 h-16 mb-4 text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 002-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
                                        <p class="text-gray-500 font-medium">Belum ada riwayat laporan.</p>
                                        <p class="text-sm mt-1">Laporan yang Anda ajukan akan muncul di sini.</p>
                                    </div>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
</body>
</html>
