<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Buat Pengaduan - Aduan Sarana Sekolah</title>
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
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 h-full flex items-center gap-4">
            <a href="{{ route('student.dashboard') }}" class="p-2 rounded-full hover:bg-gray-100 transition text-gray-500">
                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
            </a>
            <h1 class="text-xl font-semibold text-gray-900">Buat Pengaduan Baru</h1>
        </div>
    </header>

    <!-- Main Content -->
    <main class="flex-1 w-full max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
        
        <div class="bg-white rounded-3xl shadow-[0_20px_40px_rgba(0,0,0,0.04)] border border-gray-100 overflow-hidden">
            <div class="p-8 md:p-10">
                <div class="mb-8">
                    <h2 class="text-2xl font-bold text-gray-900">Formulir Laporan Kerusakan</h2>
                    <p class="text-gray-500 mt-2 text-sm">Pastikan untuk mengisi laporan dengan detail agar tim dapat segera memperbaiki sarana tersebut.</p>
                </div>

                @if ($errors->any())
                    <div class="mb-8 rounded-2xl border border-red-200 bg-red-50 p-4 text-red-800 text-sm">
                        <ul class="list-disc pl-5">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('student.pengaduan.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf
                    
                    <!-- Judul -->
                    <div>
                        <label for="judul" class="block text-sm font-medium text-gray-700 mb-2">Judul Laporan</label>
                        <input type="text" name="judul" id="judul" required placeholder="Contoh: Kipas Angin Kelas 10 IPA Mati" class="w-full rounded-2xl border border-gray-200 bg-gray-50 px-4 py-3.5 text-sm outline-none transition focus:border-red-500 focus:bg-white focus:ring-4 focus:ring-red-500/10" value="{{ old('judul') }}">
                    </div>

                    <!-- Kategori -->
                    <div>
                        <label for="category_id" class="block text-sm font-medium text-gray-700 mb-2">Kategori Sarana</label>
                        <select name="category_id" id="category_id" required class="w-full rounded-2xl border border-gray-200 bg-gray-50 px-4 py-3.5 text-sm outline-none transition focus:border-red-500 focus:bg-white focus:ring-4 focus:ring-red-500/10 appearance-none">
                            <option value="">-- Pilih Kategori --</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Deskripsi -->
                    <div>
                        <label for="deskripsi" class="block text-sm font-medium text-gray-700 mb-2">Deskripsi Detail</label>
                        <textarea name="deskripsi" id="deskripsi" rows="4" required placeholder="Jelaskan secara detail masalahnya. Contoh: Kipas mengelurakan suara aneh lalu mati total sejak kemarin sore." class="w-full rounded-2xl border border-gray-200 bg-gray-50 px-4 py-3.5 text-sm outline-none transition focus:border-red-500 focus:bg-white focus:ring-4 focus:ring-red-500/10">{{ old('deskripsi') }}</textarea>
                    </div>

                    <!-- Upload Foto -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Bukti Foto</label>
                        <div id="dropzone" class="mt-1 flex flex-col justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-2xl hover:bg-gray-50 transition cursor-pointer relative overflow-hidden min-h-[200px]" onclick="document.getElementById('foto').click()">
                            
                            <!-- Image Preview Container (Initially Hidden) -->
                            <div id="image-preview-container" class="hidden absolute inset-0 w-full h-full bg-black/5 flex items-center justify-center p-2 z-10">
                                <img id="image-preview" src="#" alt="Preview" class="h-full w-full object-contain rounded-xl">
                                <div class="absolute inset-0 bg-black/40 flex items-center justify-center opacity-0 hover:opacity-100 transition-opacity rounded-xl">
                                    <p class="text-white font-medium text-sm flex items-center gap-2">
                                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                        Ganti Foto
                                    </p>
                                </div>
                            </div>

                            <div id="upload-placeholder" class="space-y-1 text-center py-4 relative z-0">
                                <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                    <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                <div class="flex text-sm text-gray-600 justify-center">
                                    <span class="relative rounded-md font-medium text-red-500 hover:text-red-600 focus-within:outline-none">
                                        <span>Unggah file gambar</span>
                                    </span>
                                </div>
                                <p class="text-xs text-gray-500 mt-2">PNG, JPG, JPEG sampai dengan 2MB</p>
                            </div>
                        </div>
                        <input id="foto" name="foto" type="file" accept="image/*" class="sr-only" required onchange="previewImage(event)">
                    </div>

                    <div class="pt-4">
                        <button type="submit" class="w-full flex justify-center py-4 px-4 border border-transparent rounded-2xl shadow-lg shadow-red-500/30 text-sm font-semibold text-white bg-red-500 hover:bg-red-600 hover:scale-[1.02] transition-all focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                            Kirim Pengaduan Lengkap
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </main>

    <script>
        function previewImage(event) {
            const input = event.target;
            const container = document.getElementById('image-preview-container');
            const preview = document.getElementById('image-preview');
            const placeholder = document.getElementById('upload-placeholder');
            
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    container.classList.remove('hidden');
                    placeholder.classList.add('hidden');
                }
                
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
</body>
</html>
