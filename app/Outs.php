<?php

namespace App;

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
      'location_id', 'out', 'next_location_id'
    ];


  public function locationId()
  {
    return $this->belongsTo('App\Locations');
  }

  public function nextLocationId()
  {
    return $this->belongsTo('App\Locations');
  }

}
