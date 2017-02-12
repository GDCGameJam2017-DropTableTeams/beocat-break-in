<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Locations;

class Games extends Model
{
  protected $table = 'games';

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'current_location', 'game_saves', 'chaos', 'inondation'
    ];

  public function currentLocation()
  {
    return $this->belongsTo('App\Locations', 'current_location');
  }

}
