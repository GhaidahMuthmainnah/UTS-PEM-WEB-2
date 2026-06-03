<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory;

    protected $fillable = [
        'category_id',
        'nama_produk',
        'merk',
        'harga',
        'stok',
        'deskripsi'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
