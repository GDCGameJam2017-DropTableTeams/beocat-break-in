<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Locations;

class Items extends Model
{
  protected $table = 'items';

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'name', 'properties', 'environment_interaction', 'location_id'
    ];


  public function location()
  {
    return $this->belongsTo('App\Locations');
  }

}
