<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phim extends Model
{
    protected $table='phim';
    public $timestamps = true;
    public function lich()
    {
    	return $this->hasMany('App\Models\LichChieu','id_phim','id');
    }
    public function cmtphim()
    {
    	return $this->hasMany('App\Models\CmtPhim','id_phim','id');
    }
}

