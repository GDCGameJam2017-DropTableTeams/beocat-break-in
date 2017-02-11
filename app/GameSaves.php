<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Games;

class GameSaves extends Model
{
  protected $table = 'game_saves';

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'game_id', 'current_location'
  ];

  public function gameId()
  {
    return $this->belongsTo('App\Games');
  }

  public function currentLocation()
  {
    return $this->belongsTo('App\Games');
  }

}
