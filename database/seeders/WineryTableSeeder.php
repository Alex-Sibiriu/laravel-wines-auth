<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Winery;
use App\functions\helper;

class WineryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $wineries = ['Chianti', 'Langhe', 'Sudtirol', 'Val d\'Orcia'];

        foreach ($wineries as $item) {
            $winery = new Winery();
            $winery->name = $item;
            $winery->slug = helper::generateSlug($winery->name, Winery::class);

            $winery->save();
        }
    }
}
