<?php

namespace Database\Seeders;

use App\Models\Perusahaan;
use Illuminate\Database\Seeder;

class PerusahaanSeeder extends Seeder
{
    /**
     * Data dummy perusahaan.
     *
     * @var array<int, array<string, mixed>>
     */
    private array $perusahaan = [
        [
            'nama_perusahaan' => 'PT. Nusantara Sejahtera',
            'alamat' => 'Jl. Merdeka No. 12, Jakarta Pusat',
            'no_telp' => '0211234567',
            'fax' => '0211234568',
        ],
        [
            'nama_perusahaan' => 'CV. Andalas Jaya',
            'alamat' => 'Jl. Sudirman No. 45, Bandung',
            'no_telp' => '0227654321',
            'fax' => '0227654322',
        ],
        [
            'nama_perusahaan' => 'PT. Mitra Teknologi',
            'alamat' => 'Jl. Diponegoro No. 8, Surabaya',
            'no_telp' => '0319876543',
            'fax' => '0319876544',
        ],
        [
            'nama_perusahaan' => 'PT. Sinar Abadi',
            'alamat' => 'Jl. Ahmad Yani No. 30, Medan',
            'no_telp' => '0618765432',
            'fax' => '0618765433',
        ],
        [
            'nama_perusahaan' => 'CV. Borneo Makmur',
            'alamat' => 'Jl. Gatot Subroto No. 77, Balikpapan',
            'no_telp' => '0542765432',
            'fax' => '0542765433',
        ],
    ];

    /**
     * Jalankan seeder.
     */
    public function run(): void
    {
        foreach ($this->perusahaan as $data) {
            Perusahaan::firstOrCreate(
                ['nama_perusahaan' => $data['nama_perusahaan']],
                $data
            );
        }
    }
}
