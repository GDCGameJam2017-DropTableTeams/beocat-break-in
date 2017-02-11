<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class commands extends Model
{

  protected $table = 'commands';

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = ['name'];

}
