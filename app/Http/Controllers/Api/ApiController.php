<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    protected $_status = true;

    protected $_data = [];

    protected function result(){
        return response()->json([
            'status' => $this->_status,
            'data' => $this->_data
        ]);
    }
}
