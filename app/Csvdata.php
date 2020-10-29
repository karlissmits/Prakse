<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Csvdata extends Model {
    protected $fillable=['Code','Country','valid_from','valid_until','stunden','one_day','lump_sum'];
    public $timestamps = false;
     protected $table = 'csvData';
}
