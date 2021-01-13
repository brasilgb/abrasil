<?php

namespace Database\Seeders;

use App\Models\Ordem;
use Illuminate\Database\Seeder;

class OrdemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Ordem::factory()->count(40)->create();
    }
}
