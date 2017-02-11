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

    public function itemOne()
    {
      return $this->belongsTo('App\Items');
    }

    public function itemTwo()
    {
      return $this->belongsTo('App\Items');
    }

}
