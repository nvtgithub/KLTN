<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DatGhe extends Model
{
    protected $table='datghe';
    public $timestamps=true;
    public function datve()
    {
    	return $this->belongsTo('App\Models\DatVe','id_datve','id');
    }
    public function ghe()
    {
    	return $this->belongsTo('App\Models\Ghe','id_ghe','id');
    }
     public function lichchieu()
    {
    	return $this->belongsTo('App\Models\LichChieu','id_lichchieu','id');
    }
}
