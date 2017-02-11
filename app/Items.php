<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\EnvironmentInteractions;
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
      'name', 'properties', 'environment_interactions', 'location_id'
    ];

  public function environment_interactions()
  {
    return $this->hasMany('App\EnvironmentInteractions');
  }

  public function location_id()
  {
    return $this->belongsTo('App\Locations');
  }

}
