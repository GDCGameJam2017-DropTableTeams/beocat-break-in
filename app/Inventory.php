<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Games;
use App\Items;
use App\GameSaves;

class Inventory extends Model
{
    protected $table = 'inventory';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'item_id', 'game_id', 'game_save_id'
      ];

    public function item_id()
    {
      return $this->hasOne('App\Items');
    }

    public function game_id()
    {
      return $this->belongsTo('App\Games');
    }

    public function game_save_id()
    {
      return $this->belongsTo('App\GameSaves');
    }

}
