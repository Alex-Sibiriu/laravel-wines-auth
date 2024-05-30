<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Wine;
use Illuminate\Support\Str;

class winesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      $data_str = file_get_contents('https://api.sampleapis.com/wines/reds') ;

      $data= json_decode($data_str);

      foreach($data as $item){
        $wine = new Wine();
        $wine->winery = $item->winery;
        $wine->wine = $item->wine;
        $wine->rating_average = $item->rating->average;
        $wine->rating_reviews = $item->rating->reviews;
        $wine->location = $item->location;
        $wine->image = $item->image;
        $wine->slug= $this->generateSlug($wine->wine);

        $wine->save();

      }


    }

    private function generateSlug($string){

      $slug = Str::slug($string, '-');
      $original_slug = $slug;
      $exists = Wine::where('slug', $slug)->first();
      $c = 1;
      while($exists){
      $slug = $original_slug . '-' . $c;
      $exists = Wine::where('slug', $slug)->first();
      $c++;
      }

      return $slug;
      }

      // dump()


  }
