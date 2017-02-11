<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Games;

class TextCommands extends Model
{
  protected $table = 'text_commands';

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'command', 'game_id'
    ];

  public function gameId()
  {
    return $this->belongsTo('App\Games');
  }

}
