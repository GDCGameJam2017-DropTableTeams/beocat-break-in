<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class environment_interactions extends Model
{
  protected $table = 'environment_interactions';

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'game_id', 'item1', 'item2'
    ];

  public function game_id()
  {
    return $this->belongsTo('App\Games');
  }

  public function item_one()
  {
    return $this->belongsTo('App\Items');
  }

  public function item_two()
  {
    return $this->belongsTo('App\Items');
  }
}
