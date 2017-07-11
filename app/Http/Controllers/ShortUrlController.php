<?php

namespace App\Http\Controllers;

use App\ShortUrl;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ShortUrlController extends Controller
{
    public function index(Request $request, $short_url){
        $shortUrl = ShortUrl::where('short_url', $short_url)->first();
        if (is_null($shortUrl)){
            return redirect(route('create_short_url'));
        }else{
            $ip = $request->ip();
            Log::info("Redirect to id: $shortUrl->id from ip: $ip ");
            $shortUrl->views += 1;
            $shortUrl->save();
            return redirect($shortUrl->url);
        }
    }
}
