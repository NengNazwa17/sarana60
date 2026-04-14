<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Dashboard Siswa - Aduan Sarana Sekolah</title>
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

    <!-- Sidebar (Sama seperti Admin Dashboard) -->
    <aside class="w-64 bg-white border-r border-gray-200 hidden md:flex flex-col sticky top-0 h-screen shadow-sm">
        <div class="h-16 flex items-center px-6 border-b border-gray-100">
            <span class="text-xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-red-500 to-orange-500">SIPRAS</span>
        </div>
        
        <nav class="flex-1 overflow-y-auto py-4 px-3 space-y-1">
            <!-- Tautan Dashboard -->
            <a href="{{ route('student.dashboard') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl bg-red-50 text-red-600 font-medium transition hover:bg-red-50">
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/></svg>
                Dashboard
            </a>
            
            <!-- Mengganti menu admin dengan menu siswa -->
            <a href="{{ route('student.pengaduan.create') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-gray-600 font-medium transition hover:bg-gray-50 hover:text-gray-900 group">
                <svg class="w-5 h-5 text-gray-400 group-hover:text-gray-600 transition" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                Buat Laporan Baru
            </a>
            
            <a href="{{ route('student.pengaduan.index') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-gray-600 font-medium transition hover:bg-gray-50 hover:text-gray-900 group">
                <svg class="w-5 h-5 text-gray-400 group-hover:text-gray-600 transition" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                Semua Riwayat
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
        <header class="h-16 flex items-center justify-between px-6 lg:px-10 bg-white border-b border-gray-200 sticky top-0 z-10 text-gray-800">
            <h1 class="text-xl font-semibold">Dashboard Saya</h1>
            <div class="flex items-center gap-4">
                <a href="{{ route('student.pengaduan.create') }}" class="px-4 py-1.5 bg-orange-500 hover:bg-orange-600 text-white font-medium text-sm rounded-lg border border-orange-600 transition">
                    Buat Aduan Baru
                </a>
                <button type="button" onclick="alert('Belum ada notifikasi baru untuk Anda hari ini.')" class="w-10 h-10 rounded-full bg-gray-50 flex items-center justify-center text-gray-500 hover:bg-gray-100 transition relative">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/></svg>
                    <span class="absolute top-2 right-2 w-2 h-2 bg-orange-500 rounded-full border-2 border-white"></span>
                </button>
                <a href="{{ route('profile.index') }}" class="h-8 w-8 rounded-full bg-orange-500 text-white flex items-center justify-center font-bold shadow-sm" title="Profil Saya">
                    {{ strtoupper(substr(Auth::user()->name ?? 'S', 0, 1)) }}
                </a>
            </div>
        </header>

        <!-- Content Padding -->
        <div class="p-6 lg:p-10 flex-1 overflow-y-auto">
            
            @if(session('success'))
            <div id="alert-success" class="mb-6 bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-xl shadow-sm flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <svg class="w-5 h-5 text-green-500 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    <span class="font-medium text-sm">{{ session('success') }}</span>
                </div>
                <button type="button" onclick="document.getElementById('alert-success').style.display='none'" class="text-green-600 hover:text-green-800 transition rounded px-2 py-1 flex-shrink-0">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>
            </div>
            @endif

            <div class="mb-8">
                <h2 class="text-2xl font-bold text-gray-900">Halo, {{ Auth::user()->name ?? 'Siswa' }}! 👋</h2>
                <p class="text-gray-500 mt-1">Ringkasan aktivitas dan laporan Anda ada di sini.</p>
            </div>

            <!-- Stats Grid - Exactly like Admin Dashboard -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                @php
                    $countTotal = \App\Models\Pengaduan::where('user_id', Auth::id())->count();
                    $countPending = \App\Models\Pengaduan::where('user_id', Auth::id())->where('status', 'pending')->count();
                    $countProses = \App\Models\Pengaduan::where('user_id', Auth::id())->where('status', 'proses')->count();
                    $countSelesai = \App\Models\Pengaduan::where('user_id', Auth::id())->where('status', 'selesai')->count();
                @endphp

                <!-- Stat 1 -->
                <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 hover:shadow-md transition">
                    <div class="flex items-center justify-between mb-4">
                        <div class="w-12 h-12 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center">
                            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                        </div>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-500">Total Pengaduan</p>
                        <h3 class="text-3xl font-bold text-gray-900 mt-1">{{ $countTotal }}</h3>
                    </div>
                </div>

                <!-- Stat 2 -->
                <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 hover:shadow-md transition">
                    <div class="flex items-center justify-between mb-4">
                        <div class="w-12 h-12 rounded-xl bg-orange-50 text-orange-500 flex items-center justify-center">
                            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        </div>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-500">Belum Diproses</p>
                        <h3 class="text-3xl font-bold text-gray-900 mt-1">{{ $countPending }}</h3>
                    </div>
                </div>

                <!-- Stat 3 -->
                <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 hover:shadow-md transition">
                    <div class="flex items-center justify-between mb-4">
                        <div class="w-12 h-12 rounded-xl bg-yellow-50 text-yellow-600 flex items-center justify-center">
                            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/></svg>
                        </div>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-500">Sedang Diproses</p>
                        <h3 class="text-3xl font-bold text-gray-900 mt-1">{{ $countProses }}</h3>
                    </div>
                </div>

                <!-- Stat 4 -->
                <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 hover:shadow-md transition">
                    <div class="flex items-center justify-between mb-4">
                        <div class="w-12 h-12 rounded-xl bg-green-50 text-green-600 flex items-center justify-center">
                            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        </div>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-500">Selesai</p>
                        <h3 class="text-3xl font-bold text-gray-900 mt-1">{{ $countSelesai }}</h3>
                    </div>
                </div>
            </div>

            <!-- Recent Activity Table - Exactly like Admin Dashboard -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="px-6 py-5 border-b border-gray-100 flex justify-between items-center">
                    <h3 class="font-semibold text-gray-900">Riwayat Laporan Saya Terbaru</h3>
                    <a href="{{ route('student.pengaduan.index') }}" class="text-sm font-medium text-red-600 hover:text-red-700 transition">Lihat Semua</a>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-gray-50/50 text-gray-500 text-sm">
                                <th class="px-6 py-4 font-medium">Judul Laporan</th>
                                <th class="px-6 py-4 font-medium">Kategori</th>
                                <th class="px-6 py-4 font-medium">Status</th>
                                <th class="px-6 py-4 font-medium">Tanggal</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100 text-sm">
                            @php
                                $recentPengaduans = \App\Models\Pengaduan::where('user_id', Auth::id())->latest()->take(10)->get();
                            @endphp
                            
                            @forelse($recentPengaduans as $pengaduan)
                            <tr class="hover:bg-gray-50/50 transition cursor-pointer" onclick="window.location='{{ route('student.pengaduan.show', $pengaduan->id) }}'">
                                <td class="px-6 py-4 font-medium text-gray-900">{{ $pengaduan->judul }}</td>
                                <td class="px-6 py-4 text-gray-600">{{ $pengaduan->category->name ?? '-' }}</td>
                                <td class="px-6 py-4">
                                    @if($pengaduan->status == 'pending')
                                        <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-orange-100 text-orange-700">Belum diproses</span>
                                    @elseif($pengaduan->status == 'proses')
                                        <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-yellow-100 text-yellow-700">Sedang diproses</span>
                                    @else
                                        <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-green-100 text-green-700">Selesai</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 text-gray-500">{{ $pengaduan->created_at->format('d M Y') }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="px-6 py-8 text-center text-gray-500">Belum ada riwayat laporan yang pernah Anda kirim.</td>
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
