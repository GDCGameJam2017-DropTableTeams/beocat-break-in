<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Games;
use App\Items;

class EnvironmentInteractions extends Model
{
  protected $table = 'environment_interactions';

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'game_id', 'item_one_id', 'item_two_id'
    ];

  public function gameId()
  {
    return $this->belongsTo('App\Games');
  }

  public function itemOne()
  {
    return $this->belongsTo('App\Items');
  }

  public function itemTwo()
  {
    return $this->belongsTo('App\Items');
  }
}
