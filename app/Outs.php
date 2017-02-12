<?php

namespace App;

use App\Locations;
use Illuminate\Database\Eloquent\Model;


class Outs extends Model
{
  protected $table = 'outs';

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'out', 'location_id', 'next_location_id'
    ];


  public function locationId()
  {
    return $this->belongsTo('App\Locations', 'location_id');
  }

  public function nextLocationId()
  {
    return $this->belongsTo('App\Locations', 'next_location_id');
  }

}
