<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Profil Saya - SIPRAS</title>
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

    <!-- Header -->
    <header class="h-20 bg-white border-b border-gray-200 sticky top-0 z-10 shadow-sm">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 h-full flex items-center justify-between">
            <div class="flex items-center gap-3">
                <a href="{{ route('dashboard') }}" class="w-10 h-10 rounded-xl bg-gray-50 flex items-center justify-center text-gray-500 hover:bg-gray-100 hover:text-gray-900 transition border border-gray-200 mr-2" title="Kembali ke Dashboard">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                </a>
                <div class="w-10 h-10 rounded-xl bg-orange-500 flex items-center justify-center text-white shadow-sm">
                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                </div>
                <span class="text-xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-red-500 to-orange-500">Profil Saya</span>
            </div>
            
            <div class="flex items-center gap-3 pl-6 border-l border-gray-200">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="p-2 rounded-full text-gray-500 hover:bg-red-50 hover:text-red-500 transition" title="Keluar">
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                    </button>
                </form>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="flex-1 w-full max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
        
        @if(session('success'))
        <div class="mb-6 bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-xl relative flex items-center justify-between shadow-sm" role="alert">
            <span class="block sm:inline font-medium">{{ session('success') }}</span>
            <button type="button" class="text-green-700 font-bold ml-4" onclick="this.parentElement.remove();">&times;</button>
        </div>
        @endif

        @if($errors->any())
        <div class="mb-6 bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-xl relative flex items-center justify-between shadow-sm" role="alert">
            <span class="block sm:inline font-medium">{{ $errors->first() }}</span>
            <button type="button" class="text-red-700 font-bold ml-4" onclick="this.parentElement.remove();">&times;</button>
        </div>
        @endif

        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="px-8 py-6 border-b border-gray-100 bg-gray-50/50">
                <div class="flex items-center gap-4">
                    <div class="w-16 h-16 rounded-full bg-orange-500 text-white flex items-center justify-center font-bold text-2xl shadow-sm border border-orange-600">
                        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                    </div>
                    <div>
                        <h2 class="text-xl font-bold text-gray-900">{{ Auth::user()->name }}</h2>
                        <p class="text-gray-500 text-sm font-medium mt-0.5">{{ Auth::user()->role == 'admin' ? 'Administrator' : 'Siswa / Pengguna' }}</p>
                    </div>
                </div>
            </div>

            <form action="{{ route('profile.update') }}" method="POST" class="p-8">
                @csrf
                @method('PUT')
                
                <div class="space-y-6">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Nama Lengkap</label>
                        <input type="text" name="name" value="{{ old('name', Auth::user()->name) }}" required class="w-full bg-gray-50 border border-gray-200 text-gray-900 text-sm rounded-xl focus:ring-red-500 focus:border-red-500 focus:bg-white px-4 py-3 outline-none transition shadow-sm">
                    </div>
                    
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Email / Username</label>
                        <input type="email" name="email" value="{{ old('email', Auth::user()->email) }}" required class="w-full bg-gray-50 border border-gray-200 text-gray-900 text-sm rounded-xl focus:ring-red-500 focus:border-red-500 focus:bg-white px-4 py-3 outline-none transition shadow-sm">
                    </div>

                    <hr class="border-gray-100 my-8">

                    <div>
                        <h3 class="text-sm font-bold text-gray-900 mb-1">Ubah Password</h3>
                        <p class="text-xs text-gray-500 mb-4">Abaikan jika tidak ingin mengubah password saat ini.</p>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Password Baru</label>
                                <input type="password" name="password" class="w-full bg-gray-50 border border-gray-200 text-gray-900 text-sm rounded-xl focus:ring-red-500 focus:border-red-500 focus:bg-white px-4 py-3 outline-none transition shadow-sm" placeholder="Minimal 6 karakter" minlength="6">
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Konfirmasi Password Baru</label>
                                <input type="password" name="password_confirmation" class="w-full bg-gray-50 border border-gray-200 text-gray-900 text-sm rounded-xl focus:ring-red-500 focus:border-red-500 focus:bg-white px-4 py-3 outline-none transition shadow-sm" placeholder="Ketik ulang password baru">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-10 flex items-center justify-end border-t border-gray-100 pt-6">
                    <button type="submit" class="inline-flex items-center justify-center gap-2 px-5 py-2.5 bg-orange-500 hover:bg-orange-600 text-white font-medium rounded-lg transition-all border border-orange-600">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        Simpan Perubahan Profil
                    </button>
                </div>
            </form>
        </div>
    </main>
</body>
</html>
