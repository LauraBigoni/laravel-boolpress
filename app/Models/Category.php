<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;


class Category extends Model
{
    /** 
     * Serve per fare $category->posts
     */
    public function posts()
    {
        return $this->hasMany('App\Models\Post');
    }

    protected $fillable = ['label', 'color'];

    public function getFormattedDate($date, $format = 'd-m-Y H:i:s')
    {
        return Carbon::create($this->$date)->format($format);
    }
}
