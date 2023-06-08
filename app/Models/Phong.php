<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phong extends Model
{
    protected $table='phong';
    public $timestamps=true;

    public function lichchieu()
    {
    	return $this->hasMany('App\Models\LichChieu','id_phong','id');
    }
}
