<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // Gunakan property ini, hapus yang pakai tanda #
    protected $fillable = ['name'];

    public function pengaduans()
    {
        return $this->hasMany(Pengaduan::class);
    }
}
