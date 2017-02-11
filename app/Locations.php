<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Locations extends Model
{
  protected $table = 'locations';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'properties'
      ];

}
