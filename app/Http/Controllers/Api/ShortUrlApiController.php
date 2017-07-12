<?php

namespace App\Http\Controllers\Api;

use App\ShortUrl;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Support\Facades\Validator;
use Mockery\Exception;
use Ping;

class ShortUrlApiController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->_data = Auth::user()->short_urls()->orderBy('id','DESC')->get();
        return $this->result();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'url' => 'required|url',
        ]);

        $health = Ping::check($request->url);
        if($health == 200) {
            $shortUrl = new ShortUrl();
            if (!is_null($request->short_url)){
                $this->validate($request, [
                    'short_url' => 'min:'.ShortUrl::LENGTH_STRING_SHORT_URL_MIN.'|max:'.ShortUrl::LENGTH_STRING_SHORT_URL_MAX.'|unique:short_urls,short_url|regex:/^[a-zA-Z0-9]*$/'
                ]);
                $shortUrl->short_url = $request->short_url;
            }else{
                $shortUrl->short_url = ShortUrl::generateShortUrl();
            }
            $shortUrl->user_id = Auth::user()->id;
            $shortUrl->url = $request->url;
            $shortUrl->save();
            $this->_data = $shortUrl;
            return $this->result();
        } else {
            throw new Exception('Url not available');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ShortUrl $shortUrl)
    {
        $shortUrl->delete();
        return $this->result();
    }
}
