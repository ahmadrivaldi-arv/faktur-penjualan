<?php

namespace Database\Seeders;

use App\Models\User;
use Artisan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $admin = User::firstOrCreate(
            ['email' => 'superadmin@example.com'],
            ['name' => 'Super Admin']
        );

        $superAdmin = Role::firstOrCreate(['name' => 'Super Admin']);

        $admin->assignRole($superAdmin);

        $this->call([
            PerusahaanSeeder::class,
            CustomerSeeder::class,
            ProdukSeeder::class,
        ]);
    }
}
