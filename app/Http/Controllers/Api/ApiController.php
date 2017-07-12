<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * Class ApiController - class for extends api controllers
 * @package App\Http\Controllers\Api
 */
abstract class ApiController extends Controller
{
    /**
     * Status result
     * @var bool
     */
    protected $_status = true;

    /**
     * Data result
     * @var array
     */
    protected $_data = [];

    /**
     * Return result in format JSON with headers
     * @return \Illuminate\Http\JsonResponse
     */
    protected function result(){
        return response()->json([
            'status' => $this->_status,
            'data' => $this->_data
        ]);
    }
}
