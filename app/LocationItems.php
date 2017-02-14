<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Items;
use App\Locations;

class LocationItems extends Model
{

  protected $table = 'location_items';

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */


  protected $fillable = [
      'properties', 'location_id', 'item_id'
    ];


  public function location()
  {
    return $this->belongsTo('App\Locations');
  }

  public function item()
  {
    return $this->belongsTo('App\Items');
  }

}
