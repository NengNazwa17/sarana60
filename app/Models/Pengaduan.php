<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    // Gunakan cara standar ini agar lebih aman di berbagai versi Laravel
    protected $fillable = [
        'user_id',
        'category_id',
        'judul',
        'deskripsi',
        'foto_path',
        'status'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }
}
