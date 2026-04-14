<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Toilet & Sanitasi',
            'Ruang Kelas & Mebel',
            'Fasilitas Olahraga',
            'Laboratorium & Praktik',
            'Area Parkir',
            'Fasilitas Ibadah',
            'Kantin & Area Makan',
            'Perpustakaan',
            'Infrastruktur Gedung',
        ];

        foreach ($categories as $cat) {
            \App\Models\Category::firstOrCreate(['name' => $cat]);
        }
    }
}
