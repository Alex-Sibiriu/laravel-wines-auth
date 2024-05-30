<?php
namespace App\functions;
use Illuminate\Support\Str;



class helper{
    public static function generateSlug($string, $model){

      $slug = Str::slug($string, '-');
      $original_slug = $slug;
      $exists = $model::where('slug', $slug)->first();
      $c = 1;
      while($exists){
      $slug = $original_slug . '-' . $c;
      $exists = $model::where('slug', $slug)->first();
      $c++;
      }

      return $slug;
      }

}
