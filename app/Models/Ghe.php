<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ghe extends Model
{
    protected $table='ghe';
    public $timstamps=-true;

    public function phong()
    {
    	return $this->belongsTo('App\Models\Phong','id_phong','id');
    }
    public function datghe()
    {
    	return $this->hasOne('App\Models\DatGhe');
    }
    public function ve()
    {
        return $this->hasOne('App\Models\Ve','id_ghe','id');
    }
}
