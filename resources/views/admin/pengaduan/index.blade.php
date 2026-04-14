<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Daftar Pengaduan - Admin SIPRAS</title>
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
<body class="bg-gray-50 text-gray-800 antialiased min-h-screen flex">

    <!-- Sidebar -->
    <aside class="w-64 bg-white border-r border-gray-200 hidden md:flex flex-col sticky top-0 h-screen shadow-sm">
        <div class="h-16 flex items-center px-6 border-b border-gray-100">
            <span class="text-xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-red-500 to-orange-500">SIPRAS</span>
        </div>
        
        <nav class="flex-1 overflow-y-auto py-4 px-3 space-y-1">
            <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-gray-600 font-medium transition hover:bg-gray-50 hover:text-gray-900 group">
                <svg class="w-5 h-5 text-gray-400 group-hover:text-gray-600 transition" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/></svg>
                Dashboard
            </a>
            <a href="{{ route('admin.pengaduan.index') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl bg-red-50 text-red-600 font-medium transition hover:bg-red-50">
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                Daftar Pengaduan
            </a>
            <a href="{{ route('admin.pengaduan.arsip') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-gray-600 font-medium transition hover:bg-gray-50 hover:text-gray-900 group">
                <svg class="w-5 h-5 text-gray-400 group-hover:text-gray-600 transition" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"/></svg>
                Arsip Pengaduan
            </a>
            <a href="{{ route('admin.categories.index') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-gray-600 font-medium transition hover:bg-gray-50 hover:text-gray-900 group">
                <svg class="w-5 h-5 text-gray-400 group-hover:text-gray-600 transition" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/></svg>
                Manajemen Kategori
            </a>
            <a href="{{ route('admin.users.index') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-gray-600 font-medium transition hover:bg-gray-50 hover:text-gray-900 group">
                <svg class="w-5 h-5 text-gray-400 group-hover:text-gray-600 transition" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                Manajemen User
            </a>
        </nav>

        <div class="p-4 border-t border-gray-100">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="flex w-full items-center gap-3 px-3 py-2.5 rounded-xl text-gray-600 font-medium transition hover:bg-red-50 hover:text-red-600">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                    Keluar
                </button>
            </form>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 min-w-0 flex flex-col">
        <!-- Topbar -->
        <header class="h-16 flex items-center justify-between px-6 lg:px-10 bg-white border-b border-gray-200 sticky top-0 z-10">
            <div class="flex items-center gap-4">
                <h1 class="text-xl font-semibold text-gray-800">Daftar Pengaduan</h1>
            </div>
            <div class="flex items-center gap-4">
                <div class="h-8 w-8 rounded-full bg-gradient-to-tr from-red-500 to-orange-400 text-white flex items-center justify-center font-bold shadow-sm">
                    A
                </div>
            </div>
        </header>

        <!-- Content Padding -->
        <div class="p-6 lg:p-10 flex-1 overflow-y-auto">
            
            <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-8">
                <div>
                    <h2 class="text-2xl font-bold text-gray-900">Semua Laporan</h2>
                    <p class="text-gray-500 mt-1">Kelola dan tanggapi laporan aduan sarana sekolah secara efisien.</p>
                </div>
                
                <!-- Filter Form -->
                <form action="{{ route('admin.pengaduan.index') }}" method="GET" class="flex items-center gap-2">
                    <select name="status" onchange="this.form.submit()" class="bg-white border border-gray-200 text-gray-700 text-sm rounded-xl focus:ring-red-500 focus:border-red-500 block px-4 py-2.5 shadow-sm outline-none">
                        <option value="all" {{ request('status') == 'all' ? 'selected' : '' }}>Semua Status</option>
                        <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Belum Diproses</option>
                        <option value="proses" {{ request('status') == 'proses' ? 'selected' : '' }}>Sedang Diproses</option>
                        <option value="selesai" {{ request('status') == 'selesai' ? 'selected' : '' }}>Selesai</option>
                    </select>
                </form>
            </div>

            <!-- Table Card -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-gray-50/50 text-gray-500 text-sm">
                                <th class="px-6 py-4 font-medium whitespace-nowrap">ID Laporan</th>
                                <th class="px-6 py-4 font-medium whitespace-nowrap">Judul Laporan</th>
                                <th class="px-6 py-4 font-medium whitespace-nowrap">Pelapor</th>
                                <th class="px-6 py-4 font-medium whitespace-nowrap">Kategori</th>
                                <th class="px-6 py-4 font-medium whitespace-nowrap">Status</th>
                                <th class="px-6 py-4 font-medium whitespace-nowrap">Tanggal Masuk</th>
                                <th class="px-6 py-4 font-medium text-right">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100 text-sm">
                            @forelse($pengaduans as $pengaduan)
                            <tr class="hover:bg-gray-50/50 transition">
                                <td class="px-6 py-4 font-mono text-gray-500">#{{ str_pad($pengaduan->id, 5, '0', STR_PAD_LEFT) }}</td>
                                <td class="px-6 py-4 font-medium text-gray-900 max-w-[200px] truncate" title="{{ $pengaduan->judul }}">
                                    {{ $pengaduan->judul }}
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-2">
                                        <div class="w-6 h-6 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center font-bold text-xs">
                                            {{ strtoupper(substr($pengaduan->user->name ?? 'U', 0, 1)) }}
                                        </div>
                                        <span class="text-gray-600">{{ $pengaduan->user->name ?? 'Anonim' }}</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-gray-600">
                                    <span class="inline-flex items-center px-2 py-1 bg-gray-100 rounded text-xs">
                                        {{ $pengaduan->category->name ?? 'Umum' }}
                                    </span>
                                </td>
                                <td class="px-6 py-4">
                                    @if($pengaduan->status == 'pending')
                                        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-medium bg-orange-100 text-orange-700">
                                            <span class="w-1.5 h-1.5 rounded-full bg-orange-500"></span> Belum diproses
                                        </span>
                                    @elseif($pengaduan->status == 'proses')
                                        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-medium bg-yellow-100 text-yellow-700">
                                            <span class="w-1.5 h-1.5 rounded-full bg-yellow-500"></span> Sedang diproses
                                        </span>
                                    @else
                                        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-medium bg-green-100 text-green-700">
                                            <span class="w-1.5 h-1.5 rounded-full bg-green-500"></span> Selesai
                                        </span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 text-gray-500">{{ $pengaduan->created_at->format('d/m/Y H:i') }}</td>
                                <td class="px-6 py-4 text-right">
                                    <a href="{{ route('admin.pengaduan.show', $pengaduan->id) }}" class="inline-flex items-center justify-center p-2 rounded-lg text-blue-600 hover:bg-blue-50 transition" title="Lihat Detail">
                                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                    </a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7" class="px-6 py-8">
                                    <div class="flex flex-col items-center justify-center text-center">
                                        <div class="w-16 h-16 bg-gray-50 rounded-full flex items-center justify-center mb-3">
                                            <svg class="w-8 h-8 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"/></svg>
                                        </div>
                                        <p class="text-gray-500 font-medium">Tidak ada data pengaduan yang ditemukan.</p>
                                    </div>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                
                <!-- Pagination -->
                @if($pengaduans->hasPages())
                <div class="px-6 py-4 border-t border-gray-100 flex justify-between items-center bg-gray-50/30">
                    <p class="text-sm text-gray-500">
                        Menampilkan <span class="font-medium text-gray-900">{{ $pengaduans->firstItem() }}</span> - <span class="font-medium text-gray-900">{{ $pengaduans->lastItem() }}</span> dari <span class="font-medium text-gray-900">{{ $pengaduans->total() }}</span> laporan
                    </p>
                    <div class="flex items-center gap-2">
                        @if ($pengaduans->onFirstPage())
                            <span class="p-2 border border-gray-200 rounded-lg text-gray-300 cursor-not-allowed">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                            </span>
                        @else
                            <a href="{{ $pengaduans->previousPageUrl() }}" class="p-2 border border-gray-200 rounded-lg text-gray-600 hover:bg-gray-50 transition">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                            </a>
                        @endif

                        @if ($pengaduans->hasMorePages())
                            <a href="{{ $pengaduans->nextPageUrl() }}" class="p-2 border border-gray-200 rounded-lg text-gray-600 hover:bg-gray-50 transition">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                            </a>
                        @else
                            <span class="p-2 border border-gray-200 rounded-lg text-gray-300 cursor-not-allowed">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                            </span>
                        @endif
                    </div>
                </div>
                @endif
            </div>

        </div>
    </main>
</body>
</html>
