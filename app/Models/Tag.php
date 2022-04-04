<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = ['label', 'color'];
    
    public function posts() {
        return $this->belongsToMany('App\Models\Post');
    }

    public function getFormattedDate($date, $format = 'd-m-Y H:i:s')
    {
        return Carbon::create($this->$date)->format($format);
    }
}
