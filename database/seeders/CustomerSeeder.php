<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Data dummy customer.
     *
     * @var array<int, array<string, mixed>>
     */
    private array $customers = [
        [
            'nama_customer' => 'Budi Santoso',
            'perusahaan_cust' => 'PT. Nusantara Sejahtera',
            'alamat' => 'Jl. Merdeka No. 15, Jakarta Pusat',
        ],
        [
            'nama_customer' => 'Siti Rahmawati',
            'perusahaan_cust' => 'CV. Andalas Jaya',
            'alamat' => 'Jl. Gatot Subroto No. 20, Bandung',
        ],
        [
            'nama_customer' => 'Andi Wijaya',
            'perusahaan_cust' => 'PT. Mitra Teknologi',
            'alamat' => 'Jl. Diponegoro No. 35, Surabaya',
        ],
        [
            'nama_customer' => 'Ratna Dewi',
            'perusahaan_cust' => 'PT. Sinar Abadi',
            'alamat' => 'Jl. Ahmad Yani No. 50, Medan',
        ],
        [
            'nama_customer' => 'Joko Prabowo',
            'perusahaan_cust' => 'CV. Borneo Makmur',
            'alamat' => 'Jl. Soedirman No. 10, Balikpapan',
        ],
    ];

    /**
     * Jalankan seeder.
     */
    public function run(): void
    {
        foreach ($this->customers as $data) {
            Customer::firstOrCreate(
                ['nama_customer' => $data['nama_customer']],
                $data
            );
        }
    }
}
