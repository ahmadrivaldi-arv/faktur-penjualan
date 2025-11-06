<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailFaktur extends Model
{
    protected $table = 'detail_faktur';
    public $incrementing = false;
    protected $primaryKey = null;

    protected $fillable = [
        'id_produk',
        'no_faktur',
        'qty',
        'price',
    ];

    public function produk()
    {
        return $this->belongsTo(Produk::class, 'id_produk', 'id_produk');
    }

    public function faktur()
    {
        return $this->belongsTo(Faktur::class, 'no_faktur', 'no_faktur');
    }
}
