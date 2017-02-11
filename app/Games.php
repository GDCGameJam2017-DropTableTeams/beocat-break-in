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

  public function current_location()
  {
    return $this->hasOne('App\Locations');
  }

}
