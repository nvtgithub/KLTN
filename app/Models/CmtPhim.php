<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CmtPhim extends Model
{
    protected $table='cmtphim';
    public $timestamps=true;

    public function phim()
    {
    	return $this->belongsTo('App\Models\Phim','id_phim','id');
    }
    public function user()
    {
    	return $this->belongsTo('App\Models\User','id_user','id');
    }

}
