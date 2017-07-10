<?php

namespace App\Http\Controllers;

use App\ShortUrl;
use Illuminate\Http\Request;

class ShortUrlController extends Controller
{
    public function index($short_url){
        $shortUrl = ShortUrl::where('short_url', $short_url)->first();
        if (is_null($shortUrl)){
            return redirect('/not-found');
        }else{
            $shortUrl->views += 1;
            $shortUrl->save();
            return redirect($shortUrl->url);
        }
    }
}
