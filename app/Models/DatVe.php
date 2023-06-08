<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DatVe extends Model
{
    protected $table='datve';
    public $timestamps=true;
    public function lichchieu()
    {
    	return $this->belongsTo('App\Models\LichChieu','id_lichchieu','id');
    }
    public function user()
    {
    	return $this->belongsTo('App\Models\User','id_user','id');
    }
}
