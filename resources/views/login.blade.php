<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Aduan Sarana Sekolah | Login</title>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @else
            <style>
                /*! tailwindcss v4.0.7 | MIT License | https://tailwindcss.com */
                @layer base { *,:after,:before,::backdrop{box-sizing:border-box;border:0 solid;margin:0;padding:0} } /* minimal fallback */
            </style>
        @endif
    </head>
    <body class="bg-[#FDFDFC] text-[#1b1b18] min-h-screen flex items-center justify-center px-4 py-10">
        <main class="w-full max-w-xl bg-white rounded-3xl shadow-[0_25px_80px_rgba(0,0,0,0.08)] overflow-hidden">
            <section class="grid lg:grid-cols-[1.4fr_1fr] gap-0">
                <div class="p-8 sm:p-10 lg:p-12 bg-[#F53003] text-white">
                    <div class="mb-8">
                        <h1 class="text-3xl font-semibold mb-2">SIPRAS</h1>
                        <p class="text-sm leading-6 text-[#FFE8E8]">
                            Masuk untuk mengajukan pengaduan, memantau status laporan, dan mendapatkan pelayanan fasilitas sekolah.
                        </p>
                    </div>
                    <div class="space-y-4 text-sm text-[#FFE8E8]">
                        <div class="rounded-3xl bg-[#FF7B79] p-4 shadow-[0_20px_40px_rgba(0,0,0,0.12)]">
                            <p class="font-medium">Cepat</p>
                            <p class="opacity-90">Akses laporan hanya dalam beberapa detik.</p>
                        </div>
                        <div class="rounded-3xl bg-[#FF7B79] p-4 shadow-[0_20px_40px_rgba(0,0,0,0.12)]">
                            <p class="font-medium">Aman</p>
                            <p class="opacity-90">Data Anda disimpan dengan aman.</p>
                        </div>
                        <div class="rounded-3xl bg-[#FF7B79] p-4 shadow-[0_20px_40px_rgba(0,0,0,0.12)]">
                            <p class="font-medium">Mudah</p>
                            <p class="opacity-90">Antarmuka yang sederhana untuk semua pengguna.</p>
                        </div>
                    </div>
                </div>

                <div class="p-8 sm:p-10 lg:p-12 bg-white">
                    <div class="mb-8">
                        <p class="text-sm text-[#706f6c] uppercase tracking-[0.2em] mb-2">Selamat datang</p>
                        <h2 class="text-2xl font-semibold text-[#1b1b18]">Masuk ke akun Anda</h2>
                    </div>

                    @if ($errors->any())
                        <div class="mb-6 rounded-2xl border border-[#f7c2c1] bg-[#fff2f2] p-4 text-[#8c1919] text-sm">
                            {{ $errors->first() }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('login') }}" class="space-y-5">
                        @csrf
                        <div>
                            <label for="email" class="text-sm font-medium text-[#1b1b18]">Email</label>
                            <input
                                id="email"
                                type="email"
                                name="email"
                                value="{{ old('email') }}"
                                required
                                autofocus
                                class="mt-2 w-full rounded-2xl border border-[#e3e3e0] bg-[#faf9f7] px-4 py-3 text-sm text-[#1b1b18] outline-none transition focus:border-[#F53003] focus:ring-2 focus:ring-[#F53003]/20"
                            >
                        </div>

                        <div>
                            <label for="password" class="text-sm font-medium text-[#1b1b18]">Kata sandi</label>
                            <input
                                id="password"
                                type="password"
                                name="password"
                                required
                                class="mt-2 w-full rounded-2xl border border-[#e3e3e0] bg-[#faf9f7] px-4 py-3 text-sm text-[#1b1b18] outline-none transition focus:border-[#F53003] focus:ring-2 focus:ring-[#F53003]/20"
                            >
                        </div>

                        <div class="flex items-center justify-between text-sm text-[#706f6c]">
                            <label class="inline-flex items-center gap-2">
                                <input type="checkbox" name="remember" class="h-4 w-4 rounded border-[#d9d8d6] text-[#F53003] focus:ring-[#F53003]/60">
                                Ingat saya
                            </label>
                            <a href="#" class="font-medium text-[#F53003] hover:text-[#c2201c]">Lupa kata sandi?</a>
                        </div>

                        <button type="submit" class="w-full rounded-2xl bg-[#1b1b18] px-4 py-3 text-sm font-semibold text-white transition hover:bg-[#000000d1]">
                            Masuk
                        </button>
                    </form>

                    <p class="mt-6 text-center text-sm text-[#706f6c]">
                        Belum punya akun? <span class="font-semibold text-[#1b1b18]">Hubungi admin sekolah</span>
                    </p>
                </div>
            </section>
        </main>
    </body>
</html>
