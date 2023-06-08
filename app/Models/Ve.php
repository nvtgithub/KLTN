<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ve extends Model
{
    protected $table="ve";
    public $timestamps=false;

    public function lichchieu()
    {
    	return $this->belongsTo('App\Models\LichChieu','id_lichchieu','id');
    }
    public function ghe(){
    	return $this->belongsTo('App\Models\Ghe','id_ghe','id');
    }
    public function user()
    {
    	return $this->belongsTo('App\Models\User','id_user','id');
    }
    public function vephim()
    {
        return $this->hasManyThrough('App\Models\Phim', 'App\Models\LichChieu','id_phim','id_lichchieu','id');
    }
}
