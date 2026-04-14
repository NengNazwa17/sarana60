<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Manajemen User - Admin SIPRAS</title>
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
            <a href="{{ route('admin.pengaduan.index') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-gray-600 font-medium transition hover:bg-gray-50 hover:text-gray-900 group">
                <svg class="w-5 h-5 text-gray-400 group-hover:text-gray-600 transition" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
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
            <a href="{{ route('admin.users.index') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl bg-red-50 text-red-600 font-medium transition hover:bg-red-50 group">
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
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
                <h1 class="text-xl font-semibold text-gray-800">Manajemen User</h1>
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
            <div class="mb-6 bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-xl relative flex items-center justify-between" role="alert">
                <span class="block sm:inline font-medium text-sm">{{ session('success') }}</span>
                <button type="button" class="text-green-700 font-bold ml-4" onclick="this.parentElement.remove();">&times;</button>
            </div>
            @endif

            @if($errors->any())
            <div class="mb-6 bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-xl relative flex items-center justify-between" role="alert">
                <span class="block sm:inline font-medium text-sm">{{ $errors->first() }}</span>
                <button type="button" class="text-red-700 font-bold ml-4" onclick="this.parentElement.remove();">&times;</button>
            </div>
            @endif

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-8">
                
                <!-- Create User Form Card -->
                <div class="lg:col-span-1">
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden pb-10">
                        <div class="px-6 py-5 border-b border-gray-100">
                            <h3 class="font-semibold text-gray-900">Tambah Akun Baru</h3>
                            <p class="text-xs text-gray-500 mt-1">Buat akun untuk akses admin atau siswa</p>
                        </div>
                        <div class="p-6">
                            <form action="{{ route('admin.users.store') }}" method="POST">
                                @csrf
                                <div class="mb-4">
                                    <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Nama Lengkap</label>
                                    <input type="text" name="name" id="name" required placeholder="Nama User" class="w-full bg-gray-50 border border-gray-200 text-gray-900 text-sm rounded-xl focus:ring-red-500 focus:border-red-500 block px-4 py-3 outline-none transition" value="{{ old('name') }}">
                                </div>
                                <div class="mb-4">
                                    <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                                    <input type="email" name="email" id="email" required placeholder="email@sekolah.com" class="w-full bg-gray-50 border border-gray-200 text-gray-900 text-sm rounded-xl focus:ring-red-500 focus:border-red-500 block px-4 py-3 outline-none transition" value="{{ old('email') }}">
                                </div>
                                <div class="mb-4">
                                    <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Katasandi</label>
                                    <input type="password" name="password" id="password" required placeholder="Minimal 6 karakter" class="w-full bg-gray-50 border border-gray-200 text-gray-900 text-sm rounded-xl focus:ring-red-500 focus:border-red-500 block px-4 py-3 outline-none transition">
                                </div>
                                <div class="mb-5">
                                    <label for="role" class="block text-sm font-medium text-gray-700 mb-2">Peran (Role)</label>
                                    <select name="role" id="role" class="w-full bg-gray-50 border border-gray-200 text-gray-900 text-sm rounded-xl focus:ring-red-500 focus:border-red-500 block px-4 py-3 outline-none transition">
                                        <option value="student">Siswa</option>
                                        <option value="admin">Administrator</option>
                                    </select>
                                </div>
                                
                                <br>
                                <button type="submit" style="width: 100%; padding: 16px; background-color: #EF4444; color: white; border-radius: 12px; font-weight: bold; font-size: 16px; cursor: pointer; border: 2px solid #DC2626;">
                                    + SIMPAN AKUN NOW
                                </button>
                                
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Users List -->
                <div class="lg:col-span-2">
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                        <div class="px-6 py-5 border-b border-gray-100 flex justify-between items-center">
                            <div>
                                <h3 class="font-semibold text-gray-900">Daftar Pengguna</h3>
                                <p class="text-xs text-gray-500 mt-1">Total {!! $users->total() !!} akun tersimpan</p>
                            </div>
                        </div>
                        <div class="overflow-x-auto">
                            <table class="w-full text-left border-collapse">
                                <thead>
                                    <tr class="bg-gray-50/50 text-gray-500 text-sm">
                                        <th class="px-6 py-4 font-medium whitespace-nowrap">Profil & Nama</th>
                                        <th class="px-6 py-4 font-medium whitespace-nowrap">Email & Role</th>
                                        <th class="px-6 py-4 font-medium whitespace-nowrap text-right">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-100 text-sm">
                                    @forelse($users as $user)
                                    <tr class="hover:bg-gray-50/50 transition user-row">
                                        <td class="px-6 py-4 border-b border-gray-50">
                                            <div class="user-display flex items-center gap-3">
                                                <div class="w-10 h-10 rounded-full flex items-center justify-center font-bold text-sm shadow-sm {{ $user->role == 'admin' ? 'bg-red-100 text-red-600' : 'bg-blue-100 text-blue-600' }}">
                                                    {{ strtoupper(substr($user->name, 0, 1)) }}
                                                </div>
                                                <div class="flex flex-col">
                                                    <span class="font-medium text-gray-900">{{ $user->name }}</span>
                                                    @if(auth()->id() == $user->id)
                                                        <span class="text-xs text-green-600 font-semibold">(Anda)</span>
                                                    @else
                                                        <span class="text-xs text-gray-500">Bergabung {{ $user->created_at->format('M Y') }}</span>
                                                    @endif
                                                </div>
                                            </div>

                                            <form action="{{ route('admin.users.update', $user->id) }}" method="POST" class="hidden user-edit-form bg-gray-50 p-4 border border-gray-200 rounded-xl mt-2 relative shadow-inner">
                                                @csrf
                                                @method('PUT')
                                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                                    <div>
                                                        <label class="block text-xs font-medium text-gray-700 mb-1">Nama</label>
                                                        <input type="text" name="name" value="{{ $user->name }}" required class="w-full bg-white border border-gray-300 text-gray-900 text-xs rounded-lg focus:ring-red-500 focus:border-red-500 block px-3 py-2 outline-none">
                                                    </div>
                                                    <div>
                                                        <label class="block text-xs font-medium text-gray-700 mb-1">Email</label>
                                                        <input type="email" name="email" value="{{ $user->email }}" required class="w-full bg-white border border-gray-300 text-gray-900 text-xs rounded-lg focus:ring-red-500 focus:border-red-500 block px-3 py-2 outline-none">
                                                    </div>
                                                    <div>
                                                        <label class="block text-xs font-medium text-gray-700 mb-1">Katasandi (Kosongkan jika tetap)</label>
                                                        <input type="password" name="password" placeholder="***" class="w-full bg-white border border-gray-300 text-gray-900 text-xs rounded-lg focus:ring-red-500 focus:border-red-500 block px-3 py-2 outline-none">
                                                    </div>
                                                    <div>
                                                        <label class="block text-xs font-medium text-gray-700 mb-1">Role</label>
                                                        <select name="role" class="w-full bg-white border border-gray-300 text-gray-900 text-xs rounded-lg focus:ring-red-500 focus:border-red-500 block px-3 py-2 outline-none">
                                                            <option value="student" {{ $user->role == 'student' ? 'selected' : '' }}>Siswa</option>
                                                            <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Administrator</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="mt-4 flex gap-2 justify-end">
                                                    <button type="button" class="px-3 py-1.5 text-xs font-medium rounded-lg text-gray-600 bg-white border border-gray-300 hover:bg-gray-50 transition cancel-edit-btn">Batal</button>
                                                    <button type="submit" class="px-3 py-1.5 text-xs font-medium rounded-lg text-white bg-green-500 hover:bg-green-600 transition">Simpan</button>
                                                </div>
                                            </form>
                                        </td>
                                        <td class="px-6 py-4 border-b border-gray-50 user-display">
                                            <div class="flex flex-col">
                                                <span class="text-gray-600 font-medium">{{ $user->email }}</span>
                                                <div class="mt-1">
                                                    @if($user->role == 'admin')
                                                        <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded text-[10px] font-semibold bg-red-50 text-red-700 border border-red-100">
                                                            Administrator
                                                        </span>
                                                    @else
                                                        <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded text-[10px] font-semibold bg-blue-50 text-blue-700 border border-blue-100">
                                                            Siswa
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 text-right border-b border-gray-50">
                                            <div class="flex items-center justify-end gap-2 action-container">
                                                <button type="button" class="inline-flex items-center justify-center p-1.5 rounded-lg text-amber-600 hover:bg-amber-50 transition edit-btn" title="Edit">
                                                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/></svg>
                                                </button>
                                                @if(auth()->id() != $user->id)
                                                <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Apakah Anda yakin ingin menghapus akun ini?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="inline-flex items-center justify-center p-1.5 rounded-lg text-red-600 hover:bg-red-50 transition" title="Hapus">
                                                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                                    </button>
                                                </form>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="3" class="px-6 py-12 text-center text-gray-500 font-medium">Beban kerja admin sangat mudah, tidak ada user yang ditemukan.</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        
                        <!-- Pagination -->
                        @if($users->hasPages())
                        <div class="px-6 py-4 border-t border-gray-100 flex justify-between items-center bg-gray-50/30">
                            <p class="text-sm text-gray-500">
                                Menampilkan <span class="font-medium text-gray-900">{{ $users->firstItem() }}</span> - <span class="font-medium text-gray-900">{{ $users->lastItem() }}</span> dari <span class="font-medium text-gray-900">{{ $users->total() }}</span> akun pengguna
                            </p>
                            <div class="flex items-center gap-2">
                                @if ($users->onFirstPage())
                                    <span class="p-2 border border-gray-200 rounded-lg text-gray-300 cursor-not-allowed">
                                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                                    </span>
                                @else
                                    <a href="{{ $users->previousPageUrl() }}" class="p-2 border border-gray-200 rounded-lg text-gray-600 hover:bg-gray-50 transition">
                                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                                    </a>
                                @endif

                                @if ($users->hasMorePages())
                                    <a href="{{ $users->nextPageUrl() }}" class="p-2 border border-gray-200 rounded-lg text-gray-600 hover:bg-gray-50 transition">
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

            </div>
        </div>
    </main>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const editBtns = document.querySelectorAll('.edit-btn');
            const cancelBtns = document.querySelectorAll('.cancel-edit-btn');

            editBtns.forEach(btn => {
                btn.addEventListener('click', function() {
                    const row = this.closest('.user-row');
                    const displays = row.querySelectorAll('.user-display');
                    displays.forEach(el => el.classList.add('hidden'));
                    row.querySelector('.action-container').classList.add('hidden');
                    
                    const editForm = row.querySelector('.user-edit-form');
                    editForm.classList.remove('hidden');
                    // Change col-span so form takes full width of row
                    editForm.parentElement.setAttribute('colspan', '3');
                    row.querySelector('td:nth-child(2)').classList.add('hidden');
                    row.querySelector('td:nth-child(3)').classList.add('hidden');
                });
            });

            cancelBtns.forEach(btn => {
                btn.addEventListener('click', function() {
                    const row = this.closest('.user-row');
                    const displays = row.querySelectorAll('.user-display');
                    displays.forEach(el => el.classList.remove('hidden'));
                    row.querySelector('.action-container').classList.remove('hidden');
                    
                    const editForm = row.querySelector('.user-edit-form');
                    editForm.classList.add('hidden');
                    editForm.parentElement.removeAttribute('colspan');
                    row.querySelector('td:nth-child(2)').classList.remove('hidden');
                    row.querySelector('td:nth-child(3)').classList.remove('hidden');
                });
            });
        });
    </script>
</body>
</html>
