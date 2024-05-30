<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wine extends Model
{
  use HasFactory;

  protected $fillable = [
    'vineyard', 'wine', 'rating_average', 'rating_reviews', 'location', 'image', 'slug', 'winery_id'
  ];

  public function flavours()
  {
    return $this->belongsToMany(Flavour::class);
  }

  public function winery()
  {
    return $this->belongsTo(Winery::class);
  }
}
