<?php

namespace Database\Seeders;

use Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        echo "Seeding Users...\n";
        $this->call(UserSeeder::class);

        echo "Seeding Products...\n";
        $this->call(ProductSeeder::class);
    }
}
