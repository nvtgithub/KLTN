<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LichChieu extends Model
{
    protected $table='lichchieu';
    public $timestamps=true;

    public function phim()
    {
    	return $this->belongsTo('App\Models\Phim','id_phim','id');
    }
    public function rap()
    {
    	return $this->belongsTo('App\Models\Rap','id_rap','id');
    }
    public function ve()
    {
        return $this->hasMany('App\Models\Ve');
    }
    public function phong()
    {
        return $this->belongsTo('App\Models\Phong','id_phong','id');
    }
}
