<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Items;

class ItemInteractions extends Model
{
    protected $table = 'item_interactions';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'item_one', 'item_two', 'result'
      ];

    public function item_one()
    {
      return $this->belongsTo('App\Items');
    }

    public function item_two()
    {
      return $this->belongsTo('App\Items');
    }

}
