<?php

namespace Database\Seeders;

use App\Models\Flavour;
use App\Models\Wine;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FlavourWineTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 1000; $i++) {
            $wine = Wine::inRandomOrder()->first();
            $flavour_id = Flavour::inRandomOrder()->first()->id;

            if (!$wine->flavours()->where('flavour_id', $flavour_id)->exists()) {
                $wine->flavours()->attach($flavour_id);
            }
        }
    }
}
