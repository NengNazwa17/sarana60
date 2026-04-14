<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Detail Pengaduan - Admin SIPRAS</title>
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

    <!-- Sidebar (Same as Dashboard for consistency) -->
    <aside class="w-64 bg-white border-r border-gray-200 hidden md:flex flex-col sticky top-0 h-screen shadow-sm">
        <div class="h-16 flex items-center px-6 border-b border-gray-100">
            <span class="text-xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-red-500 to-orange-500">SIPRAS</span>
        </div>
        
        <nav class="flex-1 overflow-y-auto py-4 px-3 space-y-1">
            <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-gray-600 font-medium transition hover:bg-gray-50 hover:text-gray-900 group">
                <svg class="w-5 h-5 text-gray-400 group-hover:text-gray-600 transition" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/></svg>
                Dashboard
            </a>
            <a href="{{ route('admin.pengaduan.index') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-gray-600 font-medium transition hover:bg-gray-50 hover:text-gray-900">
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
                <a href="{{ route('admin.dashboard') }}" class="w-8 h-8 rounded-full bg-gray-50 flex items-center justify-center text-gray-500 hover:bg-gray-100 transition border border-gray-200">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                </a>
                <h1 class="text-xl font-semibold text-gray-800">Detail Pengaduan</h1>
            </div>
            <div class="flex items-center gap-4">
                <div class="h-8 w-8 rounded-full bg-gradient-to-tr from-red-500 to-orange-400 text-white flex items-center justify-center font-bold shadow-sm">
                    A
                </div>
            </div>
        </header>

        <!-- Content Padding -->
        <div class="p-6 lg:p-10 flex-1 overflow-y-auto">
            
            @if(session('success'))
            <div class="mb-6 bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-xl relative" role="alert">
                <span class="block sm:inline font-medium">{{ session('success') }}</span>
            </div>
            @endif

            <div class="flex flex-col lg:flex-row gap-8">
                <!-- Detail Card -->
                <div class="w-full lg:w-2/3 space-y-6">
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                        <!-- Header with Status Badge -->
                        <div class="px-8 py-6 border-b border-gray-100 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
                            <div>
                                <h1 class="text-2xl font-bold text-gray-900">{{ $pengaduan->judul }}</h1>
                                <p class="text-sm text-gray-500 mt-1">Dilaporkan pada {{ $pengaduan->created_at->format('d M Y, H:i') }}</p>
                            </div>
                            <div>
                                @if($pengaduan->status == 'pending')
                                    <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-semibold bg-orange-100 text-orange-700 border border-orange-200">
                                        🚀 Belum Diproses
                                    </span>
                                @elseif($pengaduan->status == 'proses')
                                    <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-semibold bg-yellow-100 text-yellow-700 border border-yellow-200">
                                        ⏳ Sedang Diproses
                                    </span>
                                @elseif($pengaduan->status == 'selesai')
                                    <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-semibold bg-green-100 text-green-700 border border-green-200">
                                        ✅ Selesai
                                    </span>
                                @elseif($pengaduan->status == 'ditolak')
                                    <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-semibold bg-red-100 text-red-700 border border-red-200">
                                        ❌ Ditolak
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!-- Content Info -->
                        <div class="p-8">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-8">
                                <div class="bg-gray-50 rounded-xl p-4 border border-gray-100">
                                    <p class="text-xs font-medium text-gray-500 uppercase tracking-wider mb-1">Pelapor</p>
                                    <div class="flex items-center gap-3">
                                        <div class="w-8 h-8 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center font-bold">
                                            {{ strtoupper(substr($pengaduan->user->name ?? 'U', 0, 1)) }}
                                        </div>
                                        <p class="font-semibold text-gray-900">{{ $pengaduan->user->name ?? 'Anonim' }}</p>
                                    </div>
                                </div>
                                <div class="bg-gray-50 rounded-xl p-4 border border-gray-100">
                                    <p class="text-xs font-medium text-gray-500 uppercase tracking-wider mb-1">Kategori</p>
                                    <div class="flex items-center gap-3">
                                        <div class="w-8 h-8 rounded-full bg-purple-100 text-purple-600 flex items-center justify-center">
                                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/></svg>
                                        </div>
                                        <p class="font-semibold text-gray-900">{{ $pengaduan->category->name ?? 'Umum' }}</p>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-8">
                                <h3 class="text-lg font-semibold text-gray-900 mb-3">Deskripsi Laporan</h3>
                                <div class="p-5 bg-blue-50/50 rounded-xl border border-blue-100 text-gray-700 leading-relaxed">
                                    {{ $pengaduan->deskripsi }}
                                </div>
                            </div>

                            @if($pengaduan->foto_path)
                            <div>
                                <h3 class="text-lg font-semibold text-gray-900 mb-3">Foto Lampiran</h3>
                                <div class="rounded-xl overflow-hidden border border-gray-200 inline-block shadow-sm">
                                    <img src="{{ asset('storage/' . $pengaduan->foto_path) }}" alt="Foto Aduan" class="max-w-full h-auto max-h-96 object-cover hover:scale-105 transition duration-500">
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Action Sidebar -->
                <div class="w-full lg:w-1/3">
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden sticky top-24">
                        <div class="px-6 py-5 border-b border-gray-100 bg-gray-50/50">
                            <h3 class="font-semibold text-gray-900 flex items-center gap-2">
                                <svg class="w-5 h-5 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                Update Status
                            </h3>
                        </div>
                        <div class="p-6">
                            <form action="{{ route('admin.pengaduan.status.update', $pengaduan->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                
                                <div class="space-y-4 mb-6">
                                    <label class="flex items-center p-4 border rounded-xl cursor-pointer transition hover:bg-gray-50 {{ $pengaduan->status == 'pending' ? 'border-orange-500 bg-orange-50/30' : 'border-gray-200' }}">
                                        <input type="radio" name="status" value="pending" class="w-5 h-5 text-orange-600 focus:ring-orange-500 border-gray-300" {{ $pengaduan->status == 'pending' ? 'checked' : '' }}>
                                        <div class="ml-3">
                                            <span class="block text-sm font-semibold text-gray-900">Belum Diproses</span>
                                            <span class="block text-xs text-gray-500">Laporan baru diterima</span>
                                        </div>
                                    </label>

                                    <label class="flex items-center p-4 border rounded-xl cursor-pointer transition hover:bg-gray-50 {{ $pengaduan->status == 'proses' ? 'border-yellow-500 bg-yellow-50/30' : 'border-gray-200' }}">
                                        <input type="radio" name="status" value="proses" class="w-5 h-5 text-yellow-600 focus:ring-yellow-500 border-gray-300" {{ $pengaduan->status == 'proses' ? 'checked' : '' }}>
                                        <div class="ml-3">
                                            <span class="block text-sm font-semibold text-gray-900">Sedang Diproses</span>
                                            <span class="block text-xs text-gray-500">Laporan sedang ditangani</span>
                                        </div>
                                    </label>

                                    <label class="flex items-center p-4 border rounded-xl cursor-pointer transition hover:bg-gray-50 {{ $pengaduan->status == 'selesai' ? 'border-green-500 bg-green-50/30' : 'border-gray-200' }}">
                                        <input type="radio" name="status" value="selesai" class="w-5 h-5 text-green-600 focus:ring-green-500 border-gray-300" {{ $pengaduan->status == 'selesai' ? 'checked' : '' }}>
                                        <div class="ml-3">
                                            <span class="block text-sm font-semibold text-gray-900">Selesai</span>
                                            <span class="block text-xs text-gray-500">Masalah telah terselesaikan</span>
                                        </div>
                                    </label>

                                    <label class="flex items-center p-4 border rounded-xl cursor-pointer transition hover:bg-gray-50 {{ $pengaduan->status == 'ditolak' ? 'border-red-500 bg-red-50/30' : 'border-gray-200' }}">
                                        <input type="radio" name="status" value="ditolak" class="w-5 h-5 text-red-600 focus:ring-red-500 border-gray-300" {{ $pengaduan->status == 'ditolak' ? 'checked' : '' }}>
                                        <div class="ml-3">
                                            <span class="block text-sm font-semibold text-gray-900">Ditolak</span>
                                            <span class="block text-xs text-gray-500">Laporan tidak valid / tidak dapat diproses</span>
                                        </div>
                                    </label>
                                </div>

                                <div class="mb-6">
                                    <label for="tanggapan" class="block text-sm font-semibold text-gray-900 mb-2">Tanggapan Sekolah (Opsional)</label>
                                    <textarea name="tanggapan" id="tanggapan" rows="3" placeholder="Tambahkan pesan balasan untuk pelapor..." class="w-full rounded-xl border border-gray-200 bg-gray-50 px-4 py-3 text-sm outline-none transition focus:border-red-500 focus:bg-white focus:ring-4 focus:ring-red-500/10">{{ old('tanggapan', $pengaduan->tanggapan) }}</textarea>
                                </div>

                                <button type="submit" class="w-full flex justify-center items-center gap-2 py-3 px-4 border border-transparent rounded-xl shadow-sm text-sm font-semibold text-white bg-gradient-to-r from-red-600 to-orange-500 hover:from-red-700 hover:to-orange-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition-all transform hover:scale-[1.02]">
                                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                    Simpan Perubahan
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>
</body>
</html>
