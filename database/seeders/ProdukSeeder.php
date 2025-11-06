<?php

namespace Database\Seeders;

use App\Models\Produk;
use Illuminate\Database\Seeder;

class ProdukSeeder extends Seeder
{
    /**
     * Produk dummy untuk kebutuhan awal.
     *
     * @var array<int, array<string, mixed>>
     */
    private array $produkList = [
        [
            'nama_produk' => 'Printer Thermal 58mm',
            'jenis' => 'Perangkat',
            'price' => 550000,
            'stock' => 25,
        ],
        [
            'nama_produk' => 'Kertas Struk 58mm',
            'jenis' => 'Consumable',
            'price' => 35000,
            'stock' => 120,
        ],
        [
            'nama_produk' => 'Scanner Barcode USB',
            'jenis' => 'Perangkat',
            'price' => 450000,
            'stock' => 15,
        ],
        [
            'nama_produk' => 'Laci Kasir Elektrik',
            'jenis' => 'Perangkat',
            'price' => 650000,
            'stock' => 10,
        ],
        [
            'nama_produk' => 'Software POS Basic',
            'jenis' => 'Lisensi',
            'price' => 850000,
            'stock' => 50,
        ],
    ];

    /**
     * Jalankan seeder produk.
     */
    public function run(): void
    {
        foreach ($this->produkList as $produk) {
            Produk::firstOrCreate(
                ['nama_produk' => $produk['nama_produk']],
                $produk
            );
        }
    }
}
