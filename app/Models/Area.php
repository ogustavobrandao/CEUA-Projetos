<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'nome'
  ];
  
  public function grandeArea() {
    return $this->belongsTo('App\GrandeArea', 'grande_area_id');
  }

  public function subAreas() {
    return $this->hasMany('App\SubArea');
  }

  public function solicitacaos() {
    return $this->hasMany('App\Solicitacao');
  }
}
