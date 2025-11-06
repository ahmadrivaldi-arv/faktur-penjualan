<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $table = 'produk';

    protected $primaryKey = 'id_produk';

    protected $fillable = [
        'nama_produk',
        'price',
        'jenis',
        'stock',
    ];

    public function detailFakturs()
    {
        return $this->hasMany(DetailFaktur::class, 'id_produk', 'id_produk');
    }
}
