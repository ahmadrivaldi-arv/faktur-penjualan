<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Faktur extends Model
{
    protected $table = 'faktur';
    protected $primaryKey = 'no_faktur';
    protected $fillable = [
        'tgl_faktur',
        'due_date',
        'metode_pembayaran',
        'ppn',
        'dp',
        'grand_total',
        'user',
        'id_customer',
        'id_perusahaan',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'id_customer', 'id_customer');
    }

    public function perusahaan()
    {
        return $this->belongsTo(Perusahaan::class, 'id_perusahaan', 'id_perusahaan');
    }

    public function details()
    {
        return $this->hasMany(DetailFaktur::class, 'no_faktur', 'no_faktur');
    }
}
