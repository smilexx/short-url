<?php

namespace App;

use Faker\Provider\Uuid;
use Illuminate\Database\Eloquent\Model;



class ShortUrl extends Model
{
    CONST LENGTH_STRING_SHORT_URL_MIN = 6;

    CONST LENGTH_STRING_SHORT_URL_MAX = 8;

    public function user(){
        return $this->belongsTo('App\User', 'user_id');
    }

    public static function generateShortUrl(){
        do{
            $short = str_random(rand(self::LENGTH_STRING_SHORT_URL_MIN, self::LENGTH_STRING_SHORT_URL_MAX));
        }while (self::where('short_url', $short)->count());
        return $short;
    }

    public function getShortUrlAttribute($value)
    {
        return url($value);
    }
}
